.. _json_dictionary:

================================================
地名解析辞書のJSON表現
================================================

地名解析辞書のJSON表記例を示す。
"spatial" 属性は辞書に含まれる地名語の分布する範囲 (bounding box) 
を最小経度、最小緯度と最大経度、最大緯度のペアで表現する。

JSON 表記例
================================================

都道府県辞書の例

.. literalinclude:: dictionary_pref.json
   :language: javascript

市区町村辞書の例

.. literalinclude:: dictionary_city.json
   :language: javascript
