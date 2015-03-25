.. _webapi:

================================================
WebAPI
================================================

GeoNLP WebAPI のメソッドのリファレンスです。

はじめてお使いになる場合は、必ず :ref:`webapi_readme` をお読みください。

仕様変更については :ref:`webapi_news` を参照してください。最近のお知らせは以下の通りです。

* :ref:`webapi_news_20140101`
* :ref:`dist_server` 機能の追加(2015-03-27)

概要
================================================

GeoNLP WebAPI では `JSON-RPC <http://json-rpc.org/>`_ を利用します。
:ref:`geonlp_terms_geoword` や :ref:`geonlp_terms_dictionary` 、 :ref:`geonlp_terms_address` の情報を送受信します。

なお、レスポンスとして受け渡しされる地名語、地名解析辞書、住所の
JSON 表現については :ref:`json` を、それぞれの項目の意味については
:ref:`datamodel` を参照してください。


WebAPI メソッド一覧
================================================

.. toctree::
   :maxdepth: 1

   parse
   parseStructured
   search
   getGeoInfo
   getDictionaries
   getDictionaryInfo
   addressGeocoding
   parse-option
   dist-server

..   getCodeKeys
..   getGeoFromCodes


関連文書
================================================

.. toctree::
   :maxdepth: 1

   readme_first
   apikey
   news


WebAPI のテスト
================================================

`WebAPI Checker <../../../_static/test.php>`_
