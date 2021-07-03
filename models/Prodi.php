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
    public static function getProdi()
    {
        return Self::find()->select(['nama_prodi'])->indexBy('id_prodi')->column();
    }
	public static function getProdiList($cat_id, $dependent = false)
	{
		$subCategory = self::find()
			->where(['id_jurusan' => $cat_id]);
			
		// return $subCategory;
		// $subCategory = self::find()
		// 	->where(['category_id' => $categoryID]);

		if ($cat_id == "") {
			return $subCategory->select(['id_prodi', 'nama_prodi as name'])->asArray()->all();
		} else {
			return $subCategory->select(['prodi'])->indexBy('id_prodi')->column();
		}
	}
}
