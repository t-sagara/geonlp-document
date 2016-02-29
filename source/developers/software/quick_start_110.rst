.. _software_quick_start_110:

====================================================
クイックスタート（バージョン1.1.0まで）
====================================================

GeoNLP の全ての解析機能は、コードを書かなくてもコマンドラインプログラムから利用できます。

.. _quick_parse_110:

テキストに含まれる地名語を抽出する
----------------------------------------------------

:ref:`webapi_parse` メソッドを呼び出すリクエストを作成し、
:ref:`cmd_geonlp_api` コマンドで処理します。
リクエストおよびレスポンスの詳細については :ref:`webapi_parse` の説明を参照してください。

.. sourcecode:: bash

  $ echo '{"method":"geonlp.parse","params":["沖縄県の南海上で台風が発生しました"], "id":1}' | geonlp_api
  {"error":null,"id":1,"result":[{"geo":{"geometry":{"coordinates":[127.679630,26.213300],"type":"Point"},"properties":{"address":"那覇市泉崎１－２－２","body":" 沖縄","body_kana":"オキナワ","code":{"jisx0401":"47","lasdec":"470007"},"dictionary_id":28,"entry_id":"47","fullname":"沖縄県","geonlp_id":"GzfYzt","kana":"オキナワケン","latitude":"26.2133","longitude":"127.67963","name":"沖縄県","ne_class":"都道府県","phone":"098-866-2333","suffix":["県",""],"suffix_kana":["ケン",""]},"type":"Feature"},"probability":0.500000,"surface":"沖縄県"},{"surface":"の南 海上で台風が発生しました"}]}

:ref:`geonlp_terms_geoword` が抽出されない場合は、しきい値を変更したり、利用する :ref:`geonlp_terms_dictionary` を追加する必要があります。
しきい値を変更したり、インポート済みの辞書のうちどれを利用するかを指定するには、params の第2パラメータを指定します。詳細は :ref:`webapi_parse_option` を参照してください。

:ref:`geonlp_terms_dictionary` をダウンロードしてインポートする手順は :ref:`quick_import_data` を参照してください。


.. _quick_search_110:

表記や読みから地名語を検索する
----------------------------------------------------

:ref:`webapi_search` メソッドを呼び出すリクエストを作成し、
:ref:`cmd_geonlp_api` コマンドで処理します。

.. sourcecode:: bash

  $ echo '{"method":"geonlp.search","params":["塩竃市"], "id":2}' | geonlp_api
  {"error":null,"id":2,"result":{"6DuiMk":{"address":"塩竈市旭町１－１","body":"塩竈","body_kana":"シオガマ","code":{"jisx0402":"04203","lasdec":"042030"},"dictionary_id":29,"entry_id":"04203","fullname":"塩竈市","geonlp_id":"6DuiMk","hypernym":["宮城県"],"latitude":"38.31428","longitude":"141.02248","ne_class":"市区町村\/市","suffix":["市",""],"suffix_kana":["シ",""],"tel":"022-364-1111"}}}

.. _quick_getinfo:

geonlp_id から地名語を検索する
----------------------------------------------------

:ref:`webapi_getGeoInfo` メソッドを呼び出すリクエストを作成し、
:ref:`cmd_geonlp_api` コマンドで処理します。

.. sourcecode:: bash

  $ echo '{"method":"geonlp.getGeoInfo","params":["GzfYzt"],"id":3}' | geonlp_api
  {"error":null,"id":3,"result":{"GzfYzt":{"address":"那覇市泉崎１－２－２","body":"沖縄","body_kana":"オキナワ","code":{"jisx0401":"47","lasdec":"470007"},"dictionary_id":28,"entry_id":"47","fullname":"沖縄県","geonlp_id":"GzfYzt","latitude":"26.2133","longitude":"127.67963","ne_class":"都道府県","phone":"098-866-2333","suffix":["県",""],"suffix_kana":["ケン",""]}}}

.. _quick_list_dictionary_110:

インストールされている地名解析辞書を調べる
----------------------------------------------------

:ref:`webapi_getDictionaries` メソッドを呼び出すリクエストを作成し、
:ref:`cmd_geonlp_api` コマンドで処理します。

.. sourcecode:: bash

  $ echo '{"method":"geonlp.getDictionaries","params":[],"id":4}' | geonlp_api

.. literalinclude:: quick_start_result.txt
   :language: javascript

