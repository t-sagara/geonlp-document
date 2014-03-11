.. _webapi_news:

================================================
お知らせ
================================================

.. _webapi_news_20140101:

:ref:`apikey` 導入による仕様変更 (2014-1-1)
================================================

WebAPI へのアクセスを管理するため、 :ref:`apikey` を導入しました。
WebAPI を利用する場合にはまず API キーを取得し、
POST リクエストのヘッダに X-GeoNLP-Authorization を追加して
API キーを送信してください。

API key の取得方法については :ref:`apikey` をご覧ください。

また、 endpoint の URL も変更になっています。
詳細は以下のサンプル、または各メソッド説明内の PHP サンプルコードをご覧ください。
ご迷惑をおかけいたします。

.. sourcecode:: sh

  [curl コマンドでのリクエスト例]
  curl -X POST -H "Content-Type: application/json" -H "X-GeoNLP-Authorization: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" -d '{"method":"geonlp.parse","params":["NIIは千代田区一ツ橋１－２－１にあります。神保町駅から徒歩3分。"],"id":1}' https://dias.ex.nii.ac.jp/geonlp/api/1/geo-tagging

  [wget コマンドでのリクエスト例]
  wget --header="Content-Type: application/json" --header="X-GeoNLP-Authorization: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" --post-data='{"method":"geonlp.parse","params":["NIIは千代田区一ツ橋１－２－１にあります。神保町駅から徒歩3分。"],"id":1}' https://dias.ex.nii.ac.jp/geonlp/api/1/geo-tagging

