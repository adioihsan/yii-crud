<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jurusan".
 *
 * @property int $id_jurusan
 * @property string|null $kode_jurusan
 * @property string|null $nama_jurusan
 *
 * @property Prodi[] $prodis
 */
class Jurusan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jurusan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jurusan'], 'required'],
            [['id_jurusan'], 'integer'],
            [['kode_jurusan'], 'string', 'max' => 20],
            [['nama_jurusan'], 'string', 'max' => 50],
            [['id_jurusan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jurusan' => 'Id Jurusan',
            'kode_jurusan' => 'Kode Jurusan',
            'nama_jurusan' => 'Nama Jurusan',
        ];
    }

    /**
     * Gets query for [[Prodis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdis()
    {
        return $this->hasMany(Prodi::className(), ['id_jurusan' => 'id_jurusan']);
    }
}
