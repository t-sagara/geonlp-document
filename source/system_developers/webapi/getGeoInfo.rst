.. _webapi_getGeoInfo:

================================================
getGeoInfo
================================================

説明
---------------------------------------

GeoNLP IDから地名語の詳細情報を検索する。

文法
---------------------------------------

object **geonlp.getGeoInfo** (string[] *geonlp_ids*)

リクエストパラメータ
---------------------------------------

*geonlp_ids*
  - 情報を取得したい地名語の geonlp_id の配列
  - 要素数の上限なし

リクエストの例
++++++++++++++++++++++++++++++++++++++++
.. code-block:: javascript

  { 
    "method": "geonlp.getGeoInfo",
    "params": [["tp1al0","rQ1HpF"]],
    "id": "4"
  }

レスポンス
---------------------------------------

リクエストで渡された geonlp_id をキー、対応する地名語の情報を値とするオブジェクトを返す。

レスポンスの例
++++++++++++++++++++++++++++++++++++++++
.. literalinclude:: php/getGeoInfo_result.json
   :language: javascript

PHP サンプルコード
---------------------------------------

jsonrpc_client.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/jsonrpc_client.php.txt>`

.. literalinclude:: php/jsonrpc_client.php.txt
   :language: php

getGeoInfo.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/getGeoInfo.php.txt>`

.. literalinclude:: php/getGeoInfo.php.txt
   :language: php

実行結果
+++++++++++++++++++++++++++++++++++++++
.. sourcecode:: php

  $ php getGeoInfo.php

.. literalinclude:: php/getGeoInfo_result.txt
   :language: php
