.. _datamodel_dictionary_model:

================================================================================
地名解析辞書のデータ項目
================================================================================

項目一覧
================================================================================

.. csv-table:: 地名解析辞書のデータ項目
   :header: "フィールド名", "日本語名", ":ref:`datamodel_required_types`", "型，値の範囲", "例", "注"

   ":ref:`datamodel_dictionary_identifiers`"
   "identifier", "識別子", "ServerGenerated", "URL文字列", "'https://geonlp.ex.nii.ac.jp/dictionary/admin/airport'"
   "internal_id", "内部ID", "ServerGenerated", "正の整数値", "1"
   ":ref:`datamodel_dictionary_basic_information`"
   "creator", "作成者", "Required", "1～255文字の文字列", "'管理者'"
   "title", "辞書名", "Required", "0～255文字の文字列", "'国土数値情報 空港データ'"
   "description", "辞書説明", "Required", "任意長テキスト", "'全国の公共用空港・飛行場について整備された国土数値情報空港データより、標点位置を抽出した地名辞書データ。種別（空港整備法に基づく第一種～第三種空港、共用飛行場等）、名称、設置者・管理者、特定飛行場指定状況の情報を含む。'"
   "source", "情報ソース", "Recommended", "0～255文字の文字列", "''", "URL等"
   ":ref:`datamodel_dictionary_usage_information`"
   "report_count", "修正報告件数", "ServerGenerated", "整数", "24"
   "issued", "公開日時", "ServerGenerated", "タイムスタンプ文字列または空", "'2007-05-31 00:00:00'"
   "modified", "修正日時", "ServerGenerated", "タイムスタンプ文字列または空", "'2007-08-02 00:00:00'"
   "icon", "アイコン画像URL", "Recommended", "URL文字列または空", "'https://geonlp.ex.nii.ac.jp/icon/user/admin/13Yq6j.png'"
   "url", "辞書URL", "ServerGenerated", "URL文字列または空", "'http://geonlp.ex.nii.ac.jp/dic/download?c=146321'"
   ":ref:`datamodel_dictionary_attributes`"
   "record_count", "レコード数", "ServerGenerated", "整数", "99"
   "spatial", "空間範囲", "ServerGenerated", "実数", "[122.93361, 20.42528], [153.98639, 45.55778]", "最小経度・最大経度、最大経度・最大緯度のペア"
   "subject", "収録固有名クラス", "ServerGenerated", "1文字以上の文字列", "Airport", "複数可"
