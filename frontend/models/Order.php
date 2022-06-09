<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $date
 * @property int $customer_id
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'customer_id'], 'required'],
            [['date'], 'safe'],
            [['customer_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'customer_id' => 'Customer ID',
        ];
    }

    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), [
            'id' => 'customer_id',
        ]);
    }

    public function getItems()
    {
        return Yii::$app->db->createCommand("SELECT * FROM `order`
                                    INNER JOIN order_item ON `order`.id = order_item.order_id 
                                    JOIN item ON item.id = order_item.item_id")->queryAll();
    }
}
