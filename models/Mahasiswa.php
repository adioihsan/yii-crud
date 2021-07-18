<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $id_mahasiswa
 * @property string $nama_mahasiswa
 * @property string $jenis_kelamin
 * @property string $tanggal_lahir
 * @property int $id_provinsi
 * @property int $id_kota
 * @property int $id_jurusan
 * @property int $id_prodi
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
            [['nama_mahasiswa', 'jenis_kelamin', 'tanggal_lahir', 'id_provinsi', 'id_kota', 'id_jurusan', 'id_prodi'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['id_provinsi', 'id_kota', 'id_jurusan', 'id_prodi'], 'integer'],
            [['nama_mahasiswa'], 'string', 'max' => 50],
            [['jenis_kelamin'], 'string', 'max' => 20],
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
            'tanggal_lahir' => 'Tanggal Lahir',
            'id_provinsi' => 'Id Provinsi',
            'id_kota' => 'Id Kota',
            'id_jurusan' => 'Id Jurusan',
            'id_prodi' => 'Id Prodi',
        ];
    }
}
