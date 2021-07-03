<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prodi".
 *
 * @property int $id_prodi
 * @property int|null $id_jurusan
 * @property string|null $nama_prodi
 * @property string|null $keterangan
 *
 * @property Jurusan $jurusan
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prodi'], 'required'],
            [['id_prodi', 'id_jurusan'], 'integer'],
            [['nama_prodi'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 100],
            [['id_prodi'], 'unique'],
            [['id_jurusan'], 'exist', 'skipOnError' => true, 'targetClass' => Jurusan::className(), 'targetAttribute' => ['id_jurusan' => 'id_jurusan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prodi' => 'Id Prodi',
            'id_jurusan' => 'Id Jurusan',
            'nama_prodi' => 'Nama Prodi',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * Gets query for [[Jurusan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJurusan()
    {
        return $this->hasOne(Jurusan::className(), ['id_jurusan' => 'id_jurusan']);
    }
}
