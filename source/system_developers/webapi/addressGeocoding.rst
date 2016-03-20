.. _webapi_addressGeocoding:

================================================
addressGeocoding
================================================

説明
---------------------------------------

住所文字列をジオコーディングした結果を返す。

文法
---------------------------------------

object **geonlp.addressGeocoding** (string *address* [, object *options*])

object **geonlp.addressGeocoding** (string[] *addresses* [, object *options*])

リクエストパラメータ
---------------------------------------

*address*
  - 住所文字列

*addresses*
  - 住所文字列の配列

*options*
  - 結果の詳細度を指定するためのオプション（ *geocoding* オプション）
  - オプションの詳細は :ref:`webapi_parse_option` を参照

リクエストの例
++++++++++++++++++++++++++++++++++++++++
.. sourcecode:: javascript

  { 
    "method": "geonlp.addressGeocoding",
    "params": ["千代田区一ツ橋２－１－２", {"geocoding":full}],
    "id": "9"
  }


レスポンス
---------------------------------------

住所文字列をジオコーディングして得られた住所の情報。

リクエストが配列の場合、それぞれをジオコーディングした住所情報の配列。

レスポンスの例
++++++++++++++++++++++++++++++++++++++++

.. literalinclude:: php/addressGeocoding_result.json
   :language: javascript

PHP サンプルコード
---------------------------------------

jsonrpc_client.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/jsonrpc_client.php.txt>`

.. literalinclude:: php/jsonrpc_client.php.txt
   :language: php


addressGeocoding.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/addressGeocoding.php.txt>`

.. literalinclude:: php/addressGeocoding.php.txt
   :language: php

実行結果
+++++++++++++++++++++++++++++++++++++++

.. code-block:: bash

  $ php addressGeocoding.php

.. literalinclude:: php/addressGeocoding_result.txt
   :language: php
