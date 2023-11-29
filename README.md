# MiraiTest
I. Setup and build project 
### Laravel
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan serve
### Vuejs
    
    npm install    

II. Laravel Test
1. Test1
    ![img_7.png](img_7.png)
2. Test2
    ```
   http://127.0.0.1:8000/api/accounts/showSerial?file=test12&app_env=0&contract_app=0&contract_server=0
   ```
    ![img_1.png](img_1.png)
    ![img_2.png](img_2.png)
    ![img_3.png](img_3.png)
3. Test3
   ```
   http://127.0.0.1:8000/api/accounts/all-same-name
   ```
    ![img_4.png](img_4.png)
    ![img_5.png](img_5.png)
    ![img_6.png](img_6.png)
III. Vuejs Test
    ![img_8.png](img_8.png)
    
