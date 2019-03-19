.. _software_python_api:

====================================================
Python API リファレンス
====================================================

GeoNLP を Python から利用するための API リファレンスです。
より高度なアプリケーションを Python で開発することができます。

対応している Python のバージョンは 3.5 以降で、 2.* 系には非対応です。

Python 拡張モジュールのインストール
====================================================

配布パッケージの python-extension/pygeonlp に移動し、
python setup.py install を実行してください。

.. sourcecode:: bash

  % cd python-extension/pygeonlp/
  % python setup.py install


インストール確認
----------------------------------------------------

インストールが正常に完了しているかどうか、
テストスクリプトを実行して確認します。

.. sourcecode:: bash

  % python test.py
  ............
  ----------------------------------------------------------------------
  Ran 12 tests in 0.130s

  OK

  
.. _pygeonlp_module:

pygeonlp モジュール
====================================================

Python スクリプト内で GeoNLP を利用するには
pygeonlp モジュールを import します。

.. sourcecode:: python

  import pygeonlp

pygeonlp モジュールには以下の関数が実装されています。

.. _pygeonlp_version:

pygeonlp.version
----------------------------------------------------

GeoNLP のバージョンを返します。

.. sourcecode:: python

   import pygeonlp
   print(pygeonlp.version())

.. _pygeonlp_service_object:

pygeonlp.Service オブジェクト
====================================================
   
:ref:`webapi` の機能を利用するには、 Service オブジェクトを生成して
そのオブジェクトメソッドを呼び出します。

.. sourcecode:: python
   
  import pygeonlp
  service = pygeonlp.Service()

リソースファイルを指定したい場合には、パラメータとしてリソースファイル
名を渡します。

.. sourcecode:: python

  import pygeonlp
  service = pygeonlp.Service("/usr/local/etc/geonlp.rc")

.. _pygeonlp_service_proc:

pygeonlp.Service.proc
----------------------------------------------------

:ref:`webapi` と同じ。
JSON リクエストをパラメータとして受け取り、
処理結果を JSON レスポンスとして返します。

.. sourcecode:: python

  import pygeonlp
  service = pygeonlp.Service()
  request = """
  {"method": "parse",\
   "params": ["沖縄県の南海上で台風が発生しました。",\
   {"show-candidate": false, "geojson": true}],\
   "id": 1}
  """
  print(service.proc(request))


この例のように、 proc に渡すパラメータは JSON リクエスト文字列、
結果は JSON レスポンス文字列です。
そのため、 Python オブジェクトに変換するには json.dumps, json.load
を利用する必要がある点に注意してください。

.. _pygeonlp_service.parse:

pygeonlp.Service.parse
----------------------------------------------------

:ref:`webapi_parse` と同じ。
文字列およびオプションをパラメータとして受け取り、
処理結果を Python オブジェクトとして返します。

.. sourcecode:: python

   import pygeonlp
   service = pygeonlp.Service()
   print(service.parse(
       "沖縄県の南海上で台風が発生しました。",
       {"show-candidate": False, "geojson": True}
   ))
	
オプションは Python の名前付き可変長パラメータ (keyword arguments)
ではなく dict 型の1つの値である点に注意してください。
これは :ref:`webapi` との書式の互換性を重視したためです。

より Python らしく
service.parse("文字列", geojson=True) のように呼び出すと
TypeError （parse() takes no keyword arguments） になります。

.. _pygeonlp_service.parseStructured:

pygeonlp.Service.parseStructured
----------------------------------------------------

:ref:`webapi_parseStructured` と同じ。
構造化された文字列およびオプションをパラメータとして受け取り、
処理結果を Python オブジェクトとして返します。

.. sourcecode:: python

   import pygeonlp
   service = pygeonlp.Service()
   print(service.parseStructured(
       [
           {
	       "organization": {
                   "surface": "NII",
                   "name": "国立情報学研究所",
                   "tel": "03-4212-2000（代表）"
               }
           },
           "は千代田区一ツ橋１－２－１にあります。神保町から徒歩3分。"
       ],
       {"show-candidate": False, "geocoding": "minimum"}
   ))

.. _pygeonlp_service.search:

pygeonlp.Service.search
----------------------------------------------------

:ref:`webapi_search` と同じ。
表記または読みをパラメータとして受け取り、地名語を検索します。

.. sourcecode:: python

   import pygeonlp
   service = pygeonlp.Service()
   print(service.search("四ッ谷"))


.. _pygeonlp_service.getGeoInfo:

pygeonlp.Service.getGeoInfo
----------------------------------------------------

:ref:`webapi_getGeoInfo` と同じ。
GeoNLP ID のリストをパラメータとして受け取り、
対応する地名語の詳細情報を取得します。

.. sourcecode:: python

   import pygeonlp
   service = pygeonlp.Service()
   print(service.getGeoInfo(["tp1al0", "rQ1HpF"]))

.. _pygeonlp_service.getDictionaries:

pygeonlp.Service.getDictionaries
----------------------------------------------------

:ref:`webapi_getDictionaries` と同じ。
登録されている地名解析辞書の一覧を取得します。

.. sourcecode:: python

   import pygeonlp
   service = pygeonlp.Service()
   print(service.getDictionaries())

.. _pygeonlp_service.getDictionaryInfo:

pygeonlp.Service.getDictionaryInfo
----------------------------------------------------

:ref:`webapi_getDictionaryInfo` と同じ。
地名解析辞書のIDのリストをパラメータとして渡し、
対応する辞書の詳細情報を取得します。

.. sourcecode:: python

   import pygeonlp
   service = pygeonlp.Service()
   print(service.getDictionaryInfo([28, 29]))

.. _pygeonlp_service.addressGeocoding:

pygeonlp.Service.addressGeocoding
----------------------------------------------------

:ref:`webapi_addressGeocoding` と同じ。
住所文字列をジオコーディングした結果を返します。

.. sourcecode:: python

   import pygeonlp
   service = pygeonlp.Service()
   print(service.addressGeocoding("千代田区一ツ橋2－1－2"))

.. _pygeonlp_service.analyze:

pygeonlp.Service.analyze
----------------------------------------------------

:ref:`webapi_analyze` と同じ。
住所文字列を解析した形態素解析結果、地名候補、住所解析結果を返します。

.. sourcecode:: python

   import pygeonlp
   service = pygeonlp.Service()
   print(service.analyze(
       "沖縄県の南海上で台風が発生しました。"
   ))


.. _pygeonlp_ma_object:

pygeonlp.MA オブジェクト
====================================================

拡張形態素解析の機能を利用するには、 MA オブジェクトを生成して
そのオブジェクトメソッドを呼び出します。

.. sourcecode:: python

   import pygeonlp
   ma = pygeonlp.MA()
   
リソースファイルを指定したい場合には、パラメータとして
リソースファイル名を渡します。

.. _pygeonlp_ma_parse:

pygeonlp.MA.parse
----------------------------------------------------

コマンドラインプログラム :ref:`cmd_geonlp_ma` と同じ。
自然文テキストを受け取り、拡張形態素解析を行った結果を返します。
結果は各形態素を改行コードで区切ったテキストです。

.. sourcecode:: python

   import pygeonlp
   ma = pygeonlp.MA()
   print(ma.parse("沖縄県の南海上で台風が発生しました。"))

.. _pygeonlp_ma_parseNode:

pygeonlp.MA.parseNode
----------------------------------------------------

:ref:`pygeonlp_ma_parse` と同じ処理を行いますが、
結果を Python リスト形式で返します。
