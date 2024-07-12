# G-Weather-Forecast Backend

Welcome to the G-Weather-Forecast Backend setup guide! This guide will help you set up and run the backend server locally.

## Getting Started

To get started with the G-Weather-Forecast Backend, follow these steps:

### Prerequisites

Make sure you have the following installed on your machine:
- PHP (version 7.4 or higher)
- Composer
- Laravel CLI

### Installation
1. **Clone the repository:**

   ```bash
   git clone https://github.com/ThiThanhCong/G-weather-forecast-backend.git
   cd g-weather-forecast-backend
    ```
   
3. **Install dependencies**

   ```bash
   composer install
   ```
   
5. **copy .env file:**
   
   ```bash
   cp .env.example .env
   ```
   
7. **Generate application key:**
   
   ```bash
   php artisan key:generate
   ```
   
9. **Configure your database:**
    
   Edit the `.env` file to set up your database connection.
   
11. **Run migrations:**
    
   ```bash
   php artisan migrate 
   ```

11. **Start the development server:**
    
   ```bash
   php artisan serve
   ```
