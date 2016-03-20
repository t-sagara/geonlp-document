.. _webapi_search:

================================================
search
================================================

説明
---------------------------------------

表記または読みから地名語を検索する。

接頭辞や接尾辞を省略した場合や、異体字が使われている場合にも検索できる。

文法
---------------------------------------

object **geonlp.search** (string *key* [, object *options*])

リクエストパラメータ
---------------------------------------

*key*
  - 情報を取得したい地名語の表記または読み

*options*
  - 利用する辞書とクラスを指定する
  - オプションの詳細は :ref:`webapi_parse_option` を参照

リクエストの例
++++++++++++++++++++++++++++++++++++++++
.. code-block:: javascript

  { 
    "method": "geonlp.search",
    "params": 
      ["四ッ谷"],
    "id": 3
  }

レスポンス
---------------------------------------

地名語の geonlp_id をキー、地名語情報を値とするオブジェクトを返す。
結果が複数の場合もある。

レスポンスの例
++++++++++++++++++++++++++++++++++++++++
.. literalinclude:: php/search_result.json
   :language: javascript

PHP サンプルコード
---------------------------------------

jsonrpc_client.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/jsonrpc_client.php.txt>`

.. literalinclude:: php/jsonrpc_client.php.txt
   :language: php

search.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/search.php.txt>`

.. literalinclude:: php/search.php.txt
   :language: php

実行結果
+++++++++++++++++++++++++++++++++++++++
.. code-block:: php

  $ php search.php

.. literalinclude:: php/search_result.txt
   :language: php
