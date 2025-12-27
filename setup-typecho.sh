#!/bin/bash

echo "Setting up Typecho test environment..."

# Create directory for Typecho
mkdir -p typecho-site

# Download Typecho
echo "Downloading Typecho..."
cd typecho-site
wget http://typecho.org/downloads/1.2.1/typecho.zip -O typecho.zip

# Extract Typecho
echo "Extracting Typecho..."
unzip -q typecho.zip
mv build/* ./
rm -rf build typecho.zip

# Set permissions
chmod -R 755 .
chmod -R 777 usr

cd ..

echo "Typecho downloaded and extracted successfully!"
echo ""
echo "Next steps:"
echo "1. Start Docker containers: docker-compose up -d"
echo "2. Wait for containers to be ready (about 30 seconds)"
echo "3. Open browser and go to: http://localhost:8080"
echo "4. Follow Typecho installation wizard:"
echo "   - Database Host: mysql"
echo "   - Database Port: 3306"
echo "   - Database Name: typecho"
echo "   - Database User: typecho"
echo "   - Database Password: typecho"
echo "   - Table Prefix: typecho_"
echo "5. After installation, go to Appearance > Themes and activate Fuwari theme"
echo ""
echo "MySQL credentials:"
echo "  Root Password: rootpassword"
echo "  User: typecho"
echo "  Password: typecho"
echo "  Database: typecho"
