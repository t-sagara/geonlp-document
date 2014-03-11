.. _software_advanced:

====================================================
高度な使い方
====================================================

独自サーバ上で GeoNLP を利用することで実現できる高度な使い方を紹介します。

.. _quick_geonlp_ma:

形態素解析機能だけを利用する
----------------------------------------------------

:ref:`webapi` にはない機能として、形態素解析の結果を利用することができます。解析したい文字列を :ref:`cmd_geonlp_ma` コマンドに渡します。

.. sourcecode:: bash

  $ echo '沖縄県の南海上で台風が発生しました' | geonlp_ma

  沖縄県  名詞,固有名詞,地名語,GzfYzt:沖縄県,-,*,沖縄県,オキナワケン,オキナワケン
  の      助詞,連体化,*,*,*,*,の,ノ,ノ
  南海    名詞,固有名詞,地名語,cKm02K:南海町/UpBBK0:南海,名詞-一般-*,*,南海,ナンカイ,ナンカイ
  上      名詞,接尾,副詞可能,*,*,*,上,ジョウ,ジョー
  で      助詞,格助詞,一般,*,*,*,で,デ,デ
  台風    名詞,一般,*,*,*,*,台風,タイフウ,タイフー
  が      助詞,格助詞,一般,*,*,*,が,ガ,ガ
  発生    名詞,サ変接続,*,*,*,*,発生,ハッセイ,ハッセイ
  し      動詞,自立,*,*,サ変・スル,連用形,する,シ,シ
  まし    助動詞,*,*,*,特殊・マス,連用形,ます,マシ,マシ
  た      助動詞,*,*,*,特殊・タ,基本形,た,タ,タ
  EOS

.. _quick_geonlp_api_server:

サーバ機能を利用する
----------------------------------------------------

独自アプリケーション内でオンデマンドに地名抽出を行いたい場合には、 :ref:`cmd_geonlp_api_server` コマンドでサーバプロセスを起動します。

.. sourcecode:: bash

  $ geonlp_api_server --port=8888 &

指定した tcp ポートに :ref:`webapi` のリクエストを送信すると処理結果が返ってきますので、アプリケーション内で通信を行うコードを書けば、連続的な地名抽出処理が可能になります。

.. sourcecode:: bash

  # v- 入力
  $ telnet localhost 8888
  Trying 127.0.0.1...
  Connected to localhost.localdomain (127.0.0.1).
  Escape character is '^]'.
  # v- リクエスト送信
  {"method":"geonlp.getGeoInfo","params":["GzfYzt"],"id":3}{EOR}
  {"error":null,"id":3,"result":{"GzfYzt":{"address":"那覇市泉崎１－２－２","body":"沖縄","body_kana":"オキナワ","code":{"jisx0401":"47","lasdec":"470007"},"dictionary_id":28,"entry_id":"47","fullname":"沖縄県","geonlp_id":"GzfYzt","latitude":"26.2133","longitude":"127.67963","ne_class":"都道府県","phone":"098-866-2333","suffix":["県",""],"suffix_kana":["ケン",""]}}}{EOR}

  # v- 終了送信
  {EOC}
  Connection closed by foreign host.

リクエストの終了を表すために文字列 *{EOR}* を、通信終了を表すために文字列 *{EOC}* を送信する必要があります。また、レスポンスの最後にも終端を表す文字列 *{EOR}* が付与されます。

通信プロトコルとしてはとてもナイーブなので、確実な処理が必要なアプリケーションでの利用は推奨しません。より確実な通信手段が必要な場合は、 HTTP などの高度なプロトコルを利用してください。


.. _quick_import_data:

地名解析辞書をインポートする
----------------------------------------------------

配布パッケージに含まれている以外の :ref:`geonlp_terms_dictionary` を利用するには、 `GeoNLP Data <https://geonlp.ex.nii.ac.jp/>`_ から辞書ファイルをダウンロードして、手動でインポートする必要があります。

まずダウンロードした zip ファイルを任意のディレクトリに展開します。

.. sourcecode:: text

  $ unzip new_dictionary.zip

License.txt にこのデータのライセンスが記載されているので、必ず読んで下さい。次に、 :ref:`cmd_geonlp_add` コマンドを実行し、展開して得られた csv ファイルと json ファイルをインポートします。

.. sourcecode:: text

  $ geonlp_add new_dictionary.json new_dictionary.csv

複数の辞書をインポートしたい場合は、上記の手順を繰り返してください。

最後に :ref:`cmd_geonlp_ma_makedic` コマンドを実行し、検索インデックスと形態素解析用辞書を更新します。

.. sourcecode:: text

  $ geonlp_ma_makedic -u

以上でインポート手順は完了です。
