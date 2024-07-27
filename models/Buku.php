<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buku".
 *
 * @property int $id
 * @property string $judul
 * @property string $penulis
 * @property string|null $tanggal_terbit
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul', 'penulis'], 'required'],
            [['tanggal_terbit'], 'safe'],
            [['judul', 'penulis'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'penulis' => 'Penulis',
            'tanggal_terbit' => 'Tanggal Terbit',
        ];
    }
}
