<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $id_mahasiswa
 * @property string|null $nama_mahasiswa
 * @property string|null $jenis_kelamin
 * @property string|null $tanggal_lahir
 * @property string|null $prodi
 * @property string|null $jurusan
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
            [['tanggal_lahir'], 'safe'],
            [['nama_mahasiswa', 'jurusan'], 'string', 'max' => 100],
            [['jenis_kelamin'], 'string', 'max' => 11],
            [['prodi'], 'string', 'max' => 10],
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
            'prodi' => 'Prodi',
            'jurusan' => 'Jurusan',
        ];
    }
}
