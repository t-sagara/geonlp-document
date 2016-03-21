.. _webapi_news:

================================================
WebAPI サーバを利用する方へ
================================================

.. _webapi_news_20160320:

フィルタ機能拡張（2016-03-20）
=======================================================================

:ref:`webapi_parse_option` に時間、空間の範囲によるフィルタ機能を追加しました。この機能により、たとえば「神奈川県内の地名だけ抽出したい」というオプションが指定できるようになります。関心地点とまったく違う地域の地名が抽出されてしまってお困りの際にはご利用ください。

また、バージョン 1.2.0 より、 :ref:`webapi_parse_option` に
"geojson" オプションが追加されました。このオプションを true にセットすると、
:ref:`webapi_parse`, :ref:`webapi_parseStructured` のレスポンスが GeoJSON の FeatureCollection 形式に変わります。

そのまま Google Maps API や OpenLayers などの地図ライブラリで描画することができて便利なため、将来的にはこちらをデフォルトのレスポンス形式に変更する予定です。これから GeoNLP クライアントアプリケーションを開発する場合には、 FeatureCollection 形式のレスポンスを利用することを推奨します。

1.1.0 までの GeoNLP WebAPI を利用している既存のプログラムは、 geojson オプションを指定しなければそのまま動作します。

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
