.. deprecated:: 2.0.0
   このページの内容は参照のために残してありますが、既に利用できない機能や
   現在では誤りである情報を含んでいます。システム開発者は
   :ref:`pygeonlp` を参照してください。

.. _dicapi_getDictionaries:

================================================
getDictionaries
================================================

説明
---------------------------------------

利用可能な地名辞書一覧を取得する。

URL
---------------------------------------

GET /api/dictionary


リクエストパラメータ
---------------------------------------

*user*
    - 作成者コード
    - 省略した場合、全ての作成者が対象。

*pattern*
    - 固有名クラスの正規表現。
    - 省略した場合、固有名クラスによる絞り込みを行わない。

リクエストの例
++++++++++++++++++++++++++++++++++++++++

.. https://geonlp.ex.nii.ac.jp/api/dictionary?user=canonical&pattern=Province

https://geonlp.ex.nii.ac.jp/api/dictionary?user=admin&pattern=State

レスポンス
---------------------------------------

登録されている全ての辞書の情報を要素とする、JSON形式のリストを返す。


レスポンスの例
++++++++++++++++++++++++++++++++++++++++
.. code-block:: javascript

    {
        "dictionaries":
        [
            {
                "identifier": "http://geonlp.ex.nii.ac.jp/dictionary/canonical/jp-pref",
                "internal_id": 1,
                "creator": "ユーザニックネーム",
                "title": "都道府県",
                "description": "41都1道2府43県の情報（1972年沖縄復帰後）",
                "source" : "情報ソース",
                "spatial" : [
                    [ 123.67964, 26.2133 ], [ 141.34702, 26.2133 ]
                ],
                "subject":
                [
                    "Province"
                ],
                "issued": "2013-06-07 18:24:11",
                "modified": "2013-06-07 18:24:11",
                "report_count": 214,
                "record_count": 47,
                "icon": "http://maps.google.co.jp/mapfiles/ms/icons/blue.png",
                "url": "http://geonlp.ex.nii.ac.jp/dictionary/canonical/jp-pref/%E9%83%BD%E9%81%93%E5%BA%9C%E7%9C%8C_20130607_u.zip"
            },
            {
                "identifier": "http://geonlp.ex.nii.ac.jp/dictionary/canonical/city",
                "internal_id": 2,
                "creator": "ユーザニックネーム",
                "title": "市区町村",
                "description": "2013年4月1日現在の市区町村（郡を含む）",
                "source" : "情報ソース",
                "spatial" : [
                    [ 123.00434, 24.23543 ], [ 145.5827, 45.4156 ]
                ],
                "subject":
                [
                    "State/GeneralSubprefecturalBureau",
                    "City/Village",
                    "State/County",
                    "AdministrativeArea",
                    "State/SubprefecturalBureau",
                    "City/Ward",
                    "City/Town",
                    "City",
                    "State/SubPrefectureOffice"
                ],
                "issued": "2013-06-07 18:24:22",
                "modified": "2013-06-07 18:24:22",
                "report_count": 16423,
                "record_count": 4509,
                "icon": "http://maps.google.co.jp/mapfiles/ms/icons/green.png",
                "url": "http://geonlp.ex.nii.ac.jp/dictionary/canonical/city/%E5%B8%82%E5%8C%BA%E7%94%BA%E6%9D%91_20130607_u.zip"
            }
        ]    
    }

