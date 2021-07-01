.. deprecated:: 2.0.0
   このページの内容は参照のために残してありますが、既に利用できない機能や
   現在では誤りである情報を含んでいます。システム開発者は
   :ref:`pygeonlp` を参照してください。

.. _webapi:

================================================
WebAPI
================================================

GeoNLP WebAPI のメソッドのリファレンスです。

はじめてお使いになる場合は、必ず :ref:`webapi_readme` をお読みください。

仕様変更については :ref:`webapi_news` を参照してください。

概要
================================================

GeoNLP WebAPI では `JSON-RPC <http://json-rpc.org/>`_ を利用します。
:ref:`geonlp_terms_geoword` や :ref:`geonlp_terms_dictionary` 、 :ref:`geonlp_terms_address` の情報を送受信します。

なお、レスポンスとして受け渡しされる地名語、地名解析辞書、住所の
JSON 表現については :ref:`json` を、それぞれの項目の意味については
:ref:`datamodel` を参照してください。

公開 WebAPI サーバ URL
================================================

最新のリクエスト先 URL（エンドポイント）は https://dias.ex.nii.ac.jp/geonlp/api/1/geo-tagging です。
（この URL は JSON-RPC サーバですので、ウェブブラウザで開いても何も起こりません。）

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
   analyze
   parse-option

..   getCodeKeys
..   getGeoFromCodes


関連文書
================================================

.. toctree::
   :maxdepth: 1

   readme_first
   apikey
   response_feature_array
   response_feature_collection
   dist-server

WebAPI のテスト
================================================

WebAPI が思った通りに機能しない場合は、 WebAPI Console で動作を確認してください。

`WebAPI Console <../../_static/web_api_console.html>`_
