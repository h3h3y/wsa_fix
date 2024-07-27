<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $no_telepon
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim', 'nama_mahasiswa', 'no_telepon'], 'required'],
            [['nim'], 'string', 'max' => 20],
            [['nama_mahasiswa', 'no_telepon'], 'string', 'max' => 100],
            [['nim'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nim',
            'nama_mahasiswa' => 'Nama Mahasiswa',
            'no_telepon' => 'No Telepon',
        ];
    }
}
