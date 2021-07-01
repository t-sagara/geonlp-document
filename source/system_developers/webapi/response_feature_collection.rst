.. deprecated:: 2.0.0
   このページの内容は参照のために残してありますが、既に利用できない機能や
   現在では誤りである情報を含んでいます。システム開発者は
   :ref:`pygeonlp` を参照してください。

.. _webapi_response_feature_collection:

================================================
parse レスポンス（FeatureCollection形式）
================================================


説明
---------------------------------------

:ref:`webapi_parse`, :ref:`webapi_parseStructured` のレスポンス形式。
:ref:`webapi_parse_option` の "geojson" を true にセットした場合は、この形式で返される。

地名語以外の文字列はジオメトリに null を、地名語部分は Point 型のジオメトリをもつ複数の GeoJSON オブジェクトから構成された、1つのフィーチャーコレクションオブジェクト（ `Feature Collection Object <http://geojson.org/geojson-spec.html#feature-collection-objects>`_ ）。 GeoJSON オブジェクトは多くの GIS でそのまま扱えるため、こちらのレスポンスを推奨する。

地名語を含む GeoJSON オブジェクトは、 properties メンバーに :ref:`json_geoword` か :ref:`json_address` を持つ。地名語ではない場合、properties には元の文章中の文字列が含まれる。

レスポンスの例
++++++++++++++++++++++++++++++++++++++++

.. literalinclude:: php/parse_result_featurecollection.json
   :language: javascript
