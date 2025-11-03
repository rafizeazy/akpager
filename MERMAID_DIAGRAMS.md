# Mermaid Diagrams for AKPager System

Kumpulan diagram Mermaid yang bisa langsung di-copy paste ke [mermaid.live](https://mermaid.live)

---

## 1. System Architecture Diagram

**Arsitektur sistem lengkap dengan layer-layer utama**

```mermaid
architecture-beta
    group client(cloud)[Client Layer]
    group webserver(cloud)[Web Server Layer]
    group application(cloud)[Application Layer]
    group data(cloud)[Data Layer]
    group support(cloud)[Supporting Services]

    service browser(internet)[Browser] in client
    service alpine(disk)[Alpine JS] in client

    service webserver1(server)[Web Server] in webserver
    service phpfpm(server)[PHP FPM] in webserver

    service filament(disk)[Filament Panel] in application
    service livewire(disk)[Livewire] in application
    service laravel(server)[Laravel App] in application
    service controllers(disk)[Controllers] in application
    service models(database)[Eloquent ORM] in application
    service business(disk)[Business Logic] in application

    service mysql(database)[MySQL Database] in data
    service querybuilder(disk)[Query Builder] in data

    service queueworker(server)[Queue Worker] in support
    service filestorage(disk)[File Storage] in support
    service rediscache(disk)[Redis Cache] in support

    browser:B -- T:webserver1
    alpine:B -- T:phpfpm
    webserver1:B -- T:filament
    phpfpm:R -- L:livewire
    filament:B -- T:laravel
    livewire:B -- T:controllers
    controllers:B -- T:business
    business:B -- T:models
    models:B -- T:querybuilder
    querybuilder:B -- T:mysql
    laravel:R -- L:queueworker
    laravel:R -- L:filestorage
    laravel:R -- L:rediscache
```

---

## 2. Production Infrastructure Diagram

**Arsitektur production dengan load balancer dan replication**

```mermaid
architecture-beta
    group internet(cloud)[Internet]
    group loadbalancer(cloud)[Load Balancer]
    group appservers(cloud)[Application Servers]
    group databases(cloud)[Database Tier]
    group services(cloud)[Supporting Services]

    service users(internet)[Users] in internet

    service nginx(server)[Nginx LB] in loadbalancer

    service web1(server)[Web Server 1] in appservers
    service web2(server)[Web Server 2] in appservers
    service phpfpm1(server)[PHP FPM 1] in appservers
    service phpfpm2(server)[PHP FPM 2] in appservers

    service dbmaster(database)[MySQL Master] in databases
    service dbreplica(database)[MySQL Replica] in databases

    service redis(disk)[Redis Cache] in services
    service queuewkr(server)[Queue Worker] in services
    service s3storage(disk)[S3 Storage] in services

    users:B -- T:nginx
    nginx:B -- T:web1
    nginx:B -- T:web2
    web1:B -- T:phpfpm1
    web2:B -- T:phpfpm2
    phpfpm1:B -- T:dbmaster
    phpfpm2:B -- T:dbmaster
    dbmaster:R -- L:dbreplica
    phpfpm1:R -- L:redis
    phpfpm2:R -- L:redis
    phpfpm1:R -- L:queuewkr
    phpfpm2:R -- L:s3storage
```

---

## 3. Module Architecture Diagram

**Arsitektur per modul (Blog, Finance, Purchasing)**

```mermaid
architecture-beta
    group presentation(cloud)[Presentation Layer]
    group modules(cloud)[Module Layer]
    group shared(cloud)[Shared Services]
    group persistence(cloud)[Persistence Layer]

    service filament(disk)[Filament UI] in presentation

    service blog(disk)[Blog Module] in modules
    service finance(disk)[Finance Module] in modules
    service purchasing(disk)[Purchasing Module] in modules
    service export(disk)[Export Module] in modules

    service autonumber(server)[Auto Number] in shared
    service autocalc(server)[Auto Calc] in shared
    service workflow(server)[Workflow] in shared
    service notifications(server)[Notifications] in shared

    service eloquent(database)[Eloquent ORM] in persistence
    service mysql(database)[MySQL] in persistence

    filament:B -- T:blog
    filament:B -- T:finance
    filament:B -- T:purchasing
    filament:B -- T:export
    blog:B -- T:eloquent
    finance:B -- T:autocalc
    purchasing:B -- T:autonumber
    purchasing:B -- T:autocalc
    purchasing:B -- T:workflow
    export:R -- L:notifications
    autocalc:B -- T:eloquent
    autonumber:B -- T:eloquent
    workflow:B -- T:eloquent
    eloquent:B -- T:mysql
```

---

## 4. Development Environment Diagram (XAMPP)

**Setup development environment menggunakan XAMPP**

```mermaid
architecture-beta
    group xampp(cloud)[XAMPP Environment]
    group laravel(cloud)[Laravel Application]
    group database(cloud)[Database]

    service apache(server)[Apache Server] in xampp
    service php82(server)[PHP 8.2] in xampp
    service composer(disk)[Composer] in xampp

    service akpager(disk)[AKPager App] in laravel
    service vendor(disk)[Vendor Packages] in laravel
    service publicdir(internet)[Public Assets] in laravel
    service storagedir(disk)[Storage] in laravel

    service mysql80(database)[MySQL 8.0] in database
    service smartplus(database)[smartplusid DB] in database

    apache:B -- T:akpager
    php82:R -- L:akpager
    composer:B -- T:vendor
    akpager:B -- T:publicdir
    akpager:R -- L:storagedir
    akpager:B -- T:smartplus
    mysql80:B -- T:smartplus
```

---

## 5. Purchasing Workflow Architecture

**Alur workflow purchasing dari Quotation sampai Payment**

```mermaid
architecture-beta
    group workflow(cloud)[Purchasing Workflow]
    group models(cloud)[Data Models]
    group automation(cloud)[Automation Services]

    service quotation(disk)[Quotation] in workflow
    service po(disk)[Purchase Order] in workflow
    service invoice(disk)[Invoice] in workflow
    service payment(disk)[Payment] in workflow

    service quotationitems(database)[Quotation Items] in models
    service poitems(database)[PO Items] in models
    service invoiceitems(database)[Invoice Items] in models
    service paymentrecords(database)[Payment Records] in models

    service convert(server)[Convert to PO] in automation
    service generate(server)[Generate Invoice] in automation
    service markpaid(server)[Mark as Paid] in automation
    service calculate(server)[Auto Calculate] in automation

    quotation:R -- L:convert
    convert:R -- L:po
    po:R -- L:generate
    generate:R -- L:invoice
    invoice:R -- L:markpaid
    markpaid:R -- L:payment
    quotation:B -- T:quotationitems
    po:B -- T:poitems
    invoice:B -- T:invoiceitems
    payment:B -- T:paymentrecords
    calculate:T -- B:quotationitems
    calculate:T -- B:poitems
    calculate:T -- B:invoiceitems
```

---

## 6. Export & PDF Generation Architecture

**Arsitektur sistem export dan PDF generation**

```mermaid
architecture-beta
    group ui(cloud)[User Interface]
    group processing(cloud)[Processing Layer]
    group storage(cloud)[Storage Layer]
    group notification(cloud)[Notification System]

    service exportbtn(internet)[Export Button] in ui
    service printbtn(internet)[Print PDF Button] in ui

    service excelexport(server)[Excel Export] in processing
    service pdfgen(server)[PDF Generator] in processing
    service queuejob(server)[Queue Job] in processing

    service filesystem(disk)[File System] in storage
    service exportsdb(database)[Exports Table] in storage

    service notif(server)[Notification] in notification
    service email(internet)[Email] in notification

    exportbtn:B -- T:excelexport
    printbtn:B -- T:pdfgen
    excelexport:R -- L:queuejob
    queuejob:B -- T:filesystem
    queuejob:B -- T:exportsdb
    pdfgen:B -- T:filesystem
    queuejob:R -- L:notif
    notif:R -- L:email
```

---

## 7. Security Architecture

**Lapisan keamanan sistem**

```mermaid
architecture-beta
    group perimeter(cloud)[Perimeter Security]
    group application(cloud)[Application Security]
    group data(cloud)[Data Security]

    service firewall(server)[Firewall] in perimeter
    service ssl(server)[SSL/TLS] in perimeter
    service waf(server)[WAF] in perimeter

    service auth(server)[Authentication] in application
    service authorization(server)[Authorization] in application
    service csrf(server)[CSRF Protection] in application
    service xss(server)[XSS Protection] in application

    service encryption(disk)[Encryption] in data
    service backup(disk)[Backup] in data
    service audit(database)[Audit Log] in data

    firewall:B -- T:ssl
    ssl:B -- T:waf
    waf:B -- T:auth
    auth:R -- L:authorization
    authorization:B -- T:csrf
    csrf:R -- L:xss
    xss:B -- T:encryption
    encryption:B -- T:backup
    encryption:R -- L:audit
```

---

## 8. Cache Strategy Architecture

**Strategi caching multi-layer**

```mermaid
architecture-beta
    group browser(cloud)[Browser Layer]
    group application(cloud)[Application Layer]
    group database(cloud)[Database Layer]

    service browsercache(disk)[Browser Cache] in browser
    service cdn(server)[CDN] in browser

    service appcache(disk)[App Cache] in application
    service rediscache(server)[Redis Cache] in application
    service querycache(disk)[Query Cache] in application
    service viewcache(disk)[View Cache] in application

    service mysql(database)[MySQL] in database
    service querycache2(disk)[MySQL Query Cache] in database

    browsercache:B -- T:cdn
    cdn:B -- T:appcache
    appcache:R -- L:rediscache
    rediscache:B -- T:querycache
    querycache:R -- L:viewcache
    viewcache:B -- T:mysql
    mysql:R -- L:querycache2
```

---

## Cara Penggunaan:

1. **Copy** salah satu diagram di atas (mulai dari ````mermaid` sampai `````)
2. Buka **[mermaid.live](https://mermaid.live)**
3. **Paste** code ke editor
4. Lihat preview diagram di sebelah kanan
5. **Download** sebagai PNG/SVG untuk dokumentasi

## Tips:

-   **Ganti warna**: Ubah `(cloud)`, `(server)`, `(database)`, `(disk)`, `(internet)` untuk icon berbeda
-   **Ubah koneksi**: Gunakan `T` (Top), `B` (Bottom), `L` (Left), `R` (Right) untuk arah panah
-   **Tambah service**: Format: `service name(icon)[Label] in group`
-   **Tambah group**: Format: `group name(icon)[Label]`

## Icon Reference:

-   `(cloud)` - Cloud icon
-   `(server)` - Server icon
-   `(database)` - Database icon
-   `(disk)` - Disk/Storage icon
-   `(internet)` - Globe/Internet icon

---

**Last Updated:** October 31, 2025  
**Project:** AKPager - Smart Manufacturing ERP System
