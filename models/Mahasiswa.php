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
 * @property int|null $id_prodi
 * @property int|null $id_jurusan
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
            [['id_prodi', 'id_jurusan'], 'integer'],
            [['nama_mahasiswa'], 'string', 'max' => 100],
            [['jenis_kelamin'], 'string', 'max' => 11],
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
            'id_prodi' => 'Id Prodi',
            'id_jurusan' => 'Id Jurusan',
        ];
    }
}
