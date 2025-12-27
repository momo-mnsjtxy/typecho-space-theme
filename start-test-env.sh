#!/bin/bash

echo "=========================================="
echo "Starting Typecho Test Environment"
echo "=========================================="
echo ""

# Check if Docker is available
if ! command -v docker &> /dev/null; then
    echo "Error: Docker is not installed or not in PATH"
    exit 1
fi

if ! command -v docker-compose &> /dev/null; then
    echo "Error: docker-compose is not installed or not in PATH"
    exit 1
fi

# Start Docker containers
echo "Starting Docker containers..."
docker-compose up -d

echo ""
echo "=========================================="
echo "Test Environment Setup Complete!"
echo "=========================================="
echo ""
echo "📦 Services:"
echo "  - Typecho Web: http://localhost:8080"
echo "  - MySQL: localhost:3306"
echo ""
echo "🔑 Database Credentials:"
echo "  - Host: mysql (within Docker)"
echo "  - Port: 3306"
echo "  - Database: typecho"
echo "  - Username: typecho"
echo "  - Password: typecho"
echo "  - Root Password: rootpassword"
echo ""
echo "📝 Installation Steps:"
echo "  1. Open browser and go to: http://localhost:8080"
echo "  2. Follow Typecho installation wizard"
echo "  3. Enter database credentials above"
echo "  4. Complete installation"
echo "  5. Login to admin panel"
echo "  6. Go to: Appearance → Themes"
echo "  7. Activate 'Fuwari' theme"
echo ""
echo "🛠️  Useful Commands:"
echo "  - View logs: docker-compose logs -f"
echo "  - Stop: docker-compose down"
echo "  - Restart: docker-compose restart"
echo ""
