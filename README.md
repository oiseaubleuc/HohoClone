# **HohoClone**
GitHub: oiseaubleuc



HohoClone is een Laravel-gebaseerd project dat gebruik maakt van een CI/CD-pipeline en containerisatie met Docker om een efficiënte ontwikkelings- en productieomgeving te realiseren. Dit project biedt een modern, schaalbaar platform met een sterke focus op automatisering en samenwerking.

---

## **Inhoud**
1. [Beschrijving](#beschrijving)
2. [Technologieën](#technologieën)
3. [Installatie](#installatie)
4. [Gebruik](#gebruik)
5. [CI/CD](#cicd)
6. [Docker](#docker)
7. [Bronnen](#bronnen)

---

## **Beschrijving**
Het doel van HohoClone is het implementeren van een volledig functionele Laravel-toepassing met een CI/CD-pipeline. Deze pipeline zorgt ervoor dat nieuwe codewijzigingen automatisch worden getest en gedeployed, met minimale handmatige tussenkomst. Docker wordt gebruikt om een uniforme containeromgeving te waarborgen, wat schaalbaarheid en betrouwbaarheid bevordert.

---

## **Technologieën**
- **Frameworks**: Laravel (PHP)
- **Containerisatie**: Docker
- **CI/CD**: GitHub Actions
- **Database**: SQLite
- **Frontend**: Bootstrap
- **Testing**: Laravel PHPUnit Framework

---

## **Installatie**
Volg deze stappen om het project lokaal te installeren:

1. **Clone de repository**:
    ```bash
    git clone https://github.com/gebruikersnaam/hohoclone.git
    cd hohoclone
    ```

2. **Installeer afhankelijkheden**:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Database instellen**:
    - Maak een SQLite-databasebestand:
      ```bash
      touch database/database.sqlite
      ```
    - Voer database-migraties uit:
      ```bash
      php artisan migrate
      ```

4. **Start de applicatie**:
    ```bash
    php artisan serve
    ```

5. **Docker gebruiken** (optioneel):
    ```bash
    docker-compose up -d --build
    ```

---

## **Gebruik**
- Bezoek de applicatie op `http://localhost:8000`.
- Voeg posts toe, like en deel posts, of reageer op bestaande berichten.

---

## **CI/CD**
Dit project implementeert een CI/CD-pipeline via **GitHub Actions**:
- **Continuous Integration (CI)**:
    - Nieuwe codewijzigingen worden automatisch getest met PHPUnit.
    - Database-migraties worden uitgevoerd in een geïsoleerde testomgeving.
- **Continuous Deployment (CD)**:
    - Succesvolle tests leiden tot automatische deployment in Docker-containers.
    - Productie- en testomgevingen worden gescheiden beheerd.

---

## **Docker**
Het project gebruikt Docker voor containerisatie:
- De applicatie draait binnen een PHP-container met Laravel.
- SQLite wordt gebruikt als database, die persistent is binnen de containeromgeving.

### **Belangrijke Docker-commando's**:
- **Containers opstarten**:
    ```bash
    docker-compose up -d --build
    ```
- **Database-migraties uitvoeren**:
    ```bash
    docker exec -it laravel_app php artisan migrate
    ```
- **Containers stoppen**:
    ```bash
    docker-compose down
    ```

---

## **Bronnen**
- [Laravel Documentatie](https://laravel.com/docs)
- [Docker Documentatie](https://docs.docker.com/)
- [SQLite](https://sqlite.org/docs.html)
- [Bootstrap](https://getbootstrap.com/)
- [PHPUnit](https://phpunit.de/)
- https://laravel-news.com/laravel-ci-with-github-action


Auth
https://kinsta.com/blog/laravel-breeze/

Docker
https://www.docker.com/products/docker-desktop/
https://www.tutorials24x7.com/laravel/getting-started-with-laravel-on-mac-using-docker-desktop-and-laravel-sail

Github
https://github.blog/enterprise-software/ci-cd/build-ci-cd-pipeline-github-actions-four-steps/

Youtube video's
https://www.youtube.com/watch?v=1aDuaPhJT8E
https://www.youtube.com/watch?v=6mjv2tBK1jY
https://www.youtube.com/watch?v=6jQixGjQIB0
https://www.youtube.com/watch?v=mhw7eyTA4KQ&t=70s
https://www.youtube.com/watch?v=G5Nk4VykcUw


https://medium.com/@chewysalmon/laravel-docker-development-setup-an-updated-guide-72842dfe8bdf
https://openai.com/

---

## **Contributie**
Contributies zijn welkom! Open een pull request of maak een issue aan in de repository.

---

## **Licentie**
Dit project is gelicenseerd onder de MIT-licentie. Zie [LICENSE](./LICENSE) voor meer informatie.
