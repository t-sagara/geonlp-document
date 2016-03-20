.. _webapi_news:

================================================
WebAPI サーバを利用する方へ
================================================

.. _webapi_news_20160320:

一部 API のレスポンス形式の変更とフィルタ機能拡張（2016-03-20）
=======================================================================

バージョン 1.2.0 より、 :ref:`webapi_parse`, :ref:`webapi_parseStructured` のレスポンスを GeoJSON に合わせて変更しました。これらの API のレスポンスは、そのまま Google Maps API や OpenLayers などの地図ライブラリで描画することができます。レスポンスのサンプルは各 API の説明を参照してください。

1.1.0 までの GeoNLP WebAPI を利用している既存のプログラムに修正が必要になり、ご利用の皆様にはご迷惑をおかけいたしますが、ご理解のほどお願い申し上げます。

また、 :ref:`webapi_parse_option` に時間、空間の範囲によるフィルタ機能を追加しました。この機能により、たとえば「神奈川県内の地名だけ抽出したい」というオプションが指定できるようになります。関心地点とまったく違う地域の地名が抽出されてしまってお困りの際にはご利用ください。

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
