.. _json:

================================================
JSON表現
================================================

:ref:`webapi` では、 `JSON-RPC <http://json-rpc.org/>`_ を利用して :ref:`geonlp_terms_geoword` や :ref:`geonlp_terms_dictionary` 、 :ref:`geonlp_terms_address` の情報を送受信する必要があります。

ここではこれらの情報の JSON 表現について説明します。

地名語のJSON表現
================================================

地名語のJSON表記例を示します。

地名語の JSON 表記は `GeoJSON <http://www.geojson.org/>`_ に準拠しています。

地名語 JSON 表記例
------------------------------------------------

.. literalinclude:: geoword_jinbocho.json
   :language: javascript


地名解析辞書のJSON表現
================================================

地名解析辞書のJSON表記例を示します。

"spatial" 属性は辞書に含まれる地名語の分布する範囲 (bounding box) 
を最小経度、最小緯度と最大経度、最大緯度のペアで表現します。

地名解析辞書 JSON 表記例
------------------------------------------------

都道府県辞書の例

.. literalinclude:: dictionary_pref.json
   :language: javascript

市区町村辞書の例

.. literalinclude:: dictionary_city.json
   :language: javascript

住所のJSON表現
================================================

住所のJSON表記例を示します。

住所の JSON 表記は `GeoJSON <http://www.geojson.org/>`_ に準拠しています。

住所 JSON 表記例
------------------------------------------------

.. literalinclude:: address.json
   :language: javascript
