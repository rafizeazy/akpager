# AKPager - Business Management System

<p align="center">
  <img src="public/assets/images/logos/logo.png" alt="AKPager Logo" width="200">
</p>

A comprehensive business management system built with Laravel 11 and Filament v4, featuring finance tracking, purchasing workflow, quotation management, and invoice processing.

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![Filament](https://img.shields.io/badge/Filament-4.1.10-FFAA00?style=flat)](https://filamentphp.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

## 🚀 Features

### 💰 Finance Management
- **Transaction Tracking**: Record income and expenses with detailed categorization
- **Invoice Integration**: Auto-fill transactions from invoice data
- **Dashboard**: Real-time financial statistics with charts
  - Total income/expense tracking (monthly)
  - Net profit/loss calculations
  - Transaction history with filters
  - Category breakdown visualizations
- **Multiple Payment Methods**: Cash, bank transfer, credit card, check

### 📋 Purchasing Workflow
- **Quotations**: Create and manage quotations with line items
- **Purchase Orders**: Convert quotations to POs, track status
- **Invoices**: Generate invoices from POs, manage payments
- **PDF Export**: Print quotations, POs, and invoices
- **Excel Export**: Export data for reporting

### 📝 Content Management
- **Blog System**: Posts with categories and tags
- **WYSIWYG Editor**: Rich text editing with TipTap
- **Frontend Pages**: About, Services, Projects, Contact, etc.

### 🎨 Admin Panel (Filament)
- **Modern UI**: Dark mode, responsive design
- **Widgets**: Finance stats, charts, latest transactions
- **Resource Management**: CRUD for all entities
- **Relation Managers**: Handle related records (items, payments)
- **Bulk Actions**: Export, delete multiple records

## 📸 Screenshots

### Admin Dashboard
![Dashboard](public/assets/screenshots/dashboard.png)

### Transaction Management
![Transactions](public/assets/screenshots/transactions.png)

### Invoice Auto-Fill
![Auto-Fill](public/assets/screenshots/auto-fill.png)

## 🛠️ Tech Stack

- **Backend**: Laravel 11.46.1
- **Admin Panel**: Filament v4.1.10
- **Database**: MySQL 8.0
- **Frontend**: Blade templates, Livewire 3.6.4
- **Styling**: Tailwind CSS, Bootstrap 5
- **JavaScript**: Alpine.js, jQuery
- **Charts**: Chart.js (via Filament widgets)
- **PDF**: DomPDF, Barryvdh Laravel DomPDF
- **Excel**: OpenSpout (Filament Excel export)

## 📋 Prerequisites

- PHP >= 8.2
- Composer
- MySQL >= 8.0
- Node.js & NPM (for asset compilation)
- XAMPP (recommended for development)

## 🔧 Installation

### 1. Clone the repository
```bash
git clone https://github.com/rafizeazy/akpager.git
cd akpager
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Install JavaScript dependencies
```bash
npm install
```

### 4. Environment setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Configure database
Edit `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smartplusid
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run migrations and seeders
```bash
# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed

# OR run migrations + seeders together
php artisan migrate:fresh --seed
```

### 7. Create admin user
```bash
php artisan make:filament-user
# Follow prompts to create admin account
```

### 8. Link storage
```bash
php artisan storage:link
```

### 9. Compile assets
```bash
# Development
npm run dev

# Production
npm run build
```

### 10. Start development server
```bash
php artisan serve
```

Visit:
- **Frontend**: http://localhost:8000
- **Admin Panel**: http://localhost:8000/admin

## 📚 Documentation

Comprehensive documentation available in the `/docs` folder:

- [Backend Technical Documentation](BACKEND_TECHNICAL_DOCUMENTATION.md)
- [Filament Dashboard Info](FILAMENT_DASHBOARD_INFO.md)
- [Filament Navigation Guide](FILAMENT_NAVIGATION_GUIDE.md)
- [Finance & Purchasing Guide](FINANCE_PURCHASING_GUIDE.md)
- [Transaction Auto-Fill Guide](TRANSACTION_AUTO_FILL_GUIDE.md)
- [WYSIWYG Editor Guide](WYSIWYG_EDITOR_GUIDE.md)
- [Mermaid Architecture Diagrams](MERMAID_DIAGRAMS.md)

## 🗄️ Database Schema

### Main Tables
- `users` - Admin users
- `transactions` - Financial transactions
- `invoices` - Invoice records
- `invoice_items` - Invoice line items
- `payments` - Payment records
- `purchase_orders` - Purchase orders
- `po_items` - PO line items
- `quotations` - Quotation records
- `quotation_items` - Quotation line items
- `categories` - Blog categories
- `tags` - Blog tags
- `posts` - Blog posts

See [BACKEND_TECHNICAL_DOCUMENTATION.md](BACKEND_TECHNICAL_DOCUMENTATION.md#database-schema) for complete schema details and ERD.

## 🎯 Usage

### Creating a Transaction from Invoice

1. Navigate to **Transactions** → **New Transaction**
2. Select an invoice from the dropdown
3. Form auto-fills with:
   - Amount (invoice balance)
   - Vendor name
   - Reference number
   - Notes with invoice details
4. Choose payment method
5. Upload receipt/proof (optional)
6. Save

### Managing Purchase Orders

1. Create **Quotation** → Add items
2. Convert to **Purchase Order**
3. Generate **Invoice** from PO
4. Add **Payments** to invoice
5. Export to PDF or Excel

### Dashboard Widgets

**Finance Stats Widget**:
- Shows monthly income, expense, net profit
- Trend comparison with previous month
- Mini charts for 7-day trends

**Transaction Chart Widget**:
- Bar chart comparing income vs expense

**Category Breakdown Widget**:
- Bar chart showing expenses by category

**Latest Transactions Widget**:
- Table with 10 most recent transactions
- Filters: type, payment method, category, date range

## 🔒 Security

- `.env` file excluded from version control
- CSRF protection enabled
- SQL injection prevention (Eloquent ORM)
- XSS protection (Blade escaping)
- Authentication required for admin panel
- File upload validation and sanitization

⚠️ **Important**: Never commit `.env` or sensitive credentials to version control!

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 🐛 Issues

Found a bug? Please open an issue on [GitHub Issues](https://github.com/rafizeazy/akpager/issues) with:
- Bug description
- Steps to reproduce
- Expected vs actual behavior
- Screenshots (if applicable)
- Environment details (OS, PHP version, etc.)

## 📝 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 👤 Author

**Rafi Zeazy**
- GitHub: [@rafizeazy](https://github.com/rafizeazy)

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework
- [Filament](https://filamentphp.com) - Admin Panel Framework
- [Tailwind CSS](https://tailwindcss.com) - CSS Framework
- All open-source contributors

## 📞 Support

Need help? 
- Check the [Documentation](BACKEND_TECHNICAL_DOCUMENTATION.md)
- Open an [Issue](https://github.com/rafizeazy/akpager/issues)
- Contact: [Your Email]

---

<p align="center">Made with ❤️ using Laravel & Filament</p>

