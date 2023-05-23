<?php

use yii\db\Migration;

/**
 * Class m230425_160233_shop_init
 */
class m230425_160233_shop_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //ok
        $this->createTable('user_addresses', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'address' => $this->string(255),
        ]);

        //ok
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'price' => $this->decimal(15, 2)->notNull()
        ]);

        //ok
        $this->createTable('order_to_product', [
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'product_variable_id' => $this->integer()->notNull(),
            'count' => $this->integer()->notNull(),
            'price' => $this->decimal(15, 2)->notNull()

        ]);

        //ok
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'price' => $this->decimal(15, 2)->notNull(),
            'type_id' => $this->integer()->notNull(),
            'manufacturer_id' => $this->integer(),
            'created_by' => $this->integer()->notNull(),
        ]);


        $this->createTable('product_variables', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'product_variable_id' => $this->integer()->notNull(),
            'color_hex' => $this->string(6)->notNull(),
            'allowance' => $this->integer()->notNull()
        ]);

        $this->createTable('product_variables_gallery', [
            'product_id' => $this->integer(),
            'product_variable_id' => $this->integer(),
            'gallery_id' => $this->integer()
        ]);

        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'src' => $this->string(255)->notNull()
        ]);

        $this->createTable('manufacturer', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()
        ]);

        $this->createTable('type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
        ]);

        $this->createTable('product_characteristic', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'characteristic_id' => $this->integer(),
            'value' => $this->string(32)
        ]);

        $this->createTable('characteristics', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'metric' => $this->string()->notNull()
        ]);

        $this->addForeignKey('fk-order_to_product-order_id', 'order_to_product', 'order_id', 'order', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_to_product-product_id', 'order_to_product', 'product_id', 'product', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_to_product-product_variables_id', 'order_to_product', 'product_variable_id', 'product_variables', 'id', 'CASCADE');

        $this->addForeignKey('fk-product-created_by', 'product', 'created_by', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-product-manufacturer_id', 'product', 'manufacturer_id', 'manufacturer', 'id', 'CASCADE');
        $this->addForeignKey('fk-product-type_id', 'product', 'type_id', 'type', 'id', 'CASCADE');

        $this->addForeignKey('fk-user_addresses-user_id', 'user_addresses', 'user_id', 'user', 'id', 'CASCADE');

        $this->addForeignKey('fk-order-user_id', 'order', 'user_id', 'user', 'id', 'CASCADE');

        $this->addForeignKey('fk-characteristics-type_id', 'characteristics', 'type_id', 'type', 'id', 'CASCADE');

        $this->addForeignKey('fk-product_characteristic-product_id', 'product_characteristic', 'product_id', 'product', 'id', 'CASCADE');
        $this->addForeignKey('fk-product_characteristic-characteristic_id', 'product_characteristic', 'characteristic_id', 'characteristics', 'id', 'CASCADE');

        $this->addForeignKey('fk-product_variables_gallery-product_id', 'product_variables_gallery', 'product_id', 'product', 'id', 'CASCADE');
        $this->addForeignKey('fk-product_variables_gallery-product_variable_id', 'product_variables_gallery', 'product_variable_id', 'product_variables', 'id', 'CASCADE');
        $this->addForeignKey('fk-product_variables_gallery-gallery_id', 'product_variables_gallery', 'gallery_id', 'gallery', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-order_to_product-order_id', 'order_to_product');
        $this->dropForeignKey('fk-order_to_product-product_id', 'order_to_product');
        $this->dropForeignKey('fk-order_to_product-product_variables_id', 'order_to_product');
        $this->dropForeignKey('fk-product-created_by', 'product');
        $this->dropForeignKey('fk-product-manufacturer_id', 'product');
        $this->dropForeignKey('fk-product-type_id', 'product');
        $this->dropForeignKey('fk-user_addresses-user_id', 'user_addresses');
        $this->dropForeignKey('fk-order-user_id', 'order');
        $this->dropForeignKey('fk-characteristics-type_id', 'characteristics');
        $this->dropForeignKey('fk-product_characteristic-product_id', 'product_characteristic');
        $this->dropForeignKey('fk-product_characteristic-characteristic_id', 'product_characteristic');
        $this->dropForeignKey('fk-product_variables_gallery-product_id', 'product_variables_gallery');
        $this->dropForeignKey('fk-product_variables_gallery-product_variable_id', 'product_variables_gallery');
        $this->dropForeignKey('fk-product_variables_gallery-gallery_id', 'product_variables_gallery');

        $this->dropTable('user_addresses');
        $this->dropTable('order');
        $this->dropTable('order_to_product');
        $this->dropTable('product');
        $this->dropTable('product_variables');
        $this->dropTable('product_variables_gallery');
        $this->dropTable('gallery');
        $this->dropTable('manufacturer');
        $this->dropTable('type');
        $this->dropTable('product_characteristic');
        $this->dropTable('characteristics');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230425_160233_shop_init cannot be reverted.\n";

        return false;
    }
    */
}
