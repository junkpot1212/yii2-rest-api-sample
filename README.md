Yii2 を使ったREST APIのサンプルです

## 開発環境について

開発環境はDockerによるコンテナ環境となります。

### Docker実行方法

1. Dockerのインストール

    ```
    Dockerのインストール(mac用)
    https://docs.docker.com/docker-for-mac/install/#install-and-run-docker-for-mac
    ```

1. docker composeのインストール

    ```bash
    https://docs.docker.com/compose/install/
    or
    $ pip install docker-compose
    ```

1. docker-compose.ymlがあるディレクトリに移動(このReadMeと同じ階層にあります)

1. ループバックデバイス(lo)にIPを持たせる

    ```bash
    Scriptでする場合(Mac/Linux対応)
    追加
    $ sudo bash docker-network-alias.sh -s
    注意: OS再起動すると、設定は消えてしまいます。
    ```

1. 実行

    ```bash
    $ docker-compose up -d
    注意: 初回実行時はcomposer installやnpm installなどで起動に時間がかかります。
    ```

時間がかかる or httpd が立ち上がらない場合は、 composer install に使用する Github のトークンが使用出来なくなっている場合があります。

Github から トークンを取得して、docker 内の `/root/.composer/auth.json` を開いて保存し、再度 `docker-compose stop` `docker-compose up -d`を実行してください。

1. migrateなどを実行

    ```bash
    $ docker-compose exec api php /var/www/myapp/src/yii migrate/up
    ```

1. ブラウザで確認

    ```
    http://10.52.221.1/members
    ```
Dockerコンテナへのログイン

```bash
$ docker-compose exec [コンテナ名] [/bin/bash or /bin/sh]

[root@コンテナID myapp]#

例
$ docker-compose exec api /bin/bash
```

サービス一時停止(データは消えません)

```bash
$ docker-compose stop
```

Dockerの再開

```bash
$ docker-compose start
```

Dockerのlog確認(起動に失敗しているなどの原因調査)

```bash
$ docker-compose logs
```

DockerFileに修正があった場合の再build方法

```bash
apiの場合
$ docker-compose build api
$ docker-compose up -d api
```

Dockerコンテナの削除(コンテナデータが全て消えます)

```bash
$ docker-compose down
$ docker system prune

注意: コンテナデータは消えますが、リポジトリ上にあるデータは消えません
```

DBへのログイン

```bash
ホストから直接ログインできます
 $ mysql -u root -h 10.234.51.2 -p

 注意: パスワードはdocker-compose.ymlのMYSQL_ROOT_PASSWORDを参照
```