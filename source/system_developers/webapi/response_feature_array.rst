.. _webapi_response_feature_array:

================================================
parse レスポンス（配列形式）
================================================


説明
---------------------------------------

:ref:`webapi_parse`, :ref:`webapi_parseStructured` のレスポンス形式。
:ref:`webapi_parse_option` の "geojson" をセットしなかった場合や、false にセットした場合、この形式で返される。

:ref:`json_geoword` 、 :ref:`json_address` 、元の文章中の文字列のいずれかを要素とする配列として出力される。

:ref:`webapi_response_feature_collection` とは異なり GeoJSON オブジェクトとして認識されないため利用は推奨しない。

レスポンスの例
++++++++++++++++++++++++++++++++++++++++

.. literalinclude:: php/parse_result.json
   :language: javascript
