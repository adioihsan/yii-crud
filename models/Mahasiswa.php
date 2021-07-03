<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $id_mahasiswa
 * @property string|null $nama_mahasiswa
 * @property string|null $jenis_kelamin
 * @property string|null $dob
 * @property int|null $id_prodi
 *
 * @property Prodi $prodi
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
            [['id_mahasiswa'], 'required'],
            [['id_mahasiswa', 'id_prodi'], 'integer'],
            [['dob'], 'safe'],
            [['nama_mahasiswa'], 'string', 'max' => 100],
            [['jenis_kelamin'], 'string', 'max' => 11],
            [['id_mahasiswa'], 'unique'],
            [['id_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['id_prodi' => 'id_prodi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mahasiswa' => 'Id Mahasiswa',
            'nama_mahasiswa' => 'Nama Mahasiswa',
            'jenis_kelamin' => 'Jenis Kelamin',
            'dob' => 'Tanggal Lahir',
            'id_prodi' => 'Id Prodi',
        ];
    }

    /**
     * Gets query for [[Prodi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['id_prodi' => 'id_prodi']);
    }
}
