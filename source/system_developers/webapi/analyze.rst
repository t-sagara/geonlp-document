.. _webapi_analyze:

================================================
analyze
================================================


説明
---------------------------------------

(Version 1.3.0 以降)

analyze は自然言語文を解析し、形態素解析結果と
抽出された地名語候補、住所解析結果を全て含む
全ての情報を取得する。


文法
---------------------------------------

object ** geonlp.analyze ** (string * sentence * [, object * options*])

リクエストパラメータ
---------------------------------------

*sentence*
- 変換したいテキスト
- 長さの上限なし

*options*
- 利用する辞書の指定など、処理のオプションを設定する
- オプションの詳細は: ref: `webapi_parse_option` を参照

リクエストの例
++++++++++++++++++++++++++++++++++++++++
.. code-block:: javascript

  {
      "method": "geonlp.analyze",
      "params":
      [
          "NIIは千代田区一ツ橋２－１－２にあります。神保町から徒歩3分。",
          {"geocoding": true}
      ],
      "id": "1"
  }

レスポンス
----------------------------------------

構造化テキストを返す。

:ref:`webapi_parse_option` の "geojson", "show-candidate" の
指定に関わらず、内部で保持している形式のまま全ての地名語候補が
出力される。

.. literalinclude:: php/analyze_result.json
   :language: javascript

