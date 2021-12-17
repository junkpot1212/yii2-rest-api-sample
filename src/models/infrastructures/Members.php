<?php

namespace app\models\infrastructures;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "members".
 *
 * @property int    $id   ID
 * @property string $name 名前
 * @property string $addr 住所
 * @property int    $qty  数量
 */
class Members extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'members';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name', 'addr', 'qty'], 'required'],
            [['qty'], 'integer'],
            [['name'], 'string', 'max' => 36],
            [['addr'], 'string', 'max' => 128],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'id'   => 'ID',
            'name' => 'Name',
            'addr' => 'Addr',
            'qty'  => 'Qty',
        ];
    }
}
