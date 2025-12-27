#!/bin/bash

echo "=========================================="
echo "Fuwari Typecho Theme - Deployment Check"
echo "=========================================="
echo ""

# Color codes
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check counters
total_checks=0
passed_checks=0

# Function to check file existence
check_file() {
    total_checks=$((total_checks + 1))
    if [ -f "$1" ]; then
        echo -e "${GREEN}✓${NC} $2"
        passed_checks=$((passed_checks + 1))
        return 0
    else
        echo -e "${RED}✗${NC} $2 - Missing: $1"
        return 1
    fi
}

# Function to check directory
check_dir() {
    total_checks=$((total_checks + 1))
    if [ -d "$1" ]; then
        echo -e "${GREEN}✓${NC} $2"
        passed_checks=$((passed_checks + 1))
        return 0
    else
        echo -e "${RED}✗${NC} $2 - Missing: $1"
        return 1
    fi
}

echo "📋 Checking Theme Files..."
echo ""

# Check main theme files
check_file "fuwari-typecho/header.php" "Header template"
check_file "fuwari-typecho/footer.php" "Footer template"
check_file "fuwari-typecho/sidebar.php" "Sidebar template"
check_file "fuwari-typecho/index.php" "Index template"
check_file "fuwari-typecho/post.php" "Post template"
check_file "fuwari-typecho/page.php" "Page template"
check_file "fuwari-typecho/archive.php" "Archive template"
check_file "fuwari-typecho/comments.php" "Comments template"
check_file "fuwari-typecho/functions.php" "Functions file"
check_file "fuwari-typecho/style.css" "Style metadata"
check_file "fuwari-typecho/README.md" "Theme README"

echo ""
echo "📦 Checking Assets..."
echo ""

# Check assets directory
check_dir "fuwari-typecho/assets" "Assets directory"
check_file "fuwari-typecho/assets/Layout.DSulWsr7.css" "Main Layout CSS"
check_file "fuwari-typecho/assets/Layout.y4KPJ9hc.css" "Layout CSS (2)"
check_file "fuwari-typecho/assets/_page_.DpTWXJf8.css" "Page CSS"
check_file "fuwari-typecho/assets/_page_.ZlghMKVQ.css" "Page CSS (2)"
check_file "fuwari-typecho/assets/about.BtniRLn_.css" "About CSS"
check_file "fuwari-typecho/assets/ec.4fsv9.css" "Expressive Code CSS"
check_file "fuwari-typecho/assets/page.Z8IJTFqj.js" "Main JS"
check_dir "fuwari-typecho/assets/images/favicon" "Favicon directory"

echo ""
echo "📚 Checking Documentation..."
echo ""

# Check documentation
check_file "README.md" "Main README"
check_file "PROJECT_SUMMARY.md" "Project Summary"
check_file "QUICK_START.md" "Quick Start Guide"
check_file "VERIFICATION_CHECKLIST.md" "Verification Checklist"

echo ""
echo "🐳 Checking Docker Environment..."
echo ""

# Check Docker files
check_file "docker-compose.yml" "Docker Compose config"
check_file "start-test-env.sh" "Start script"
check_file "setup-typecho.sh" "Setup script"

echo ""
echo "📁 Checking Typecho Installation..."
echo ""

# Check Typecho
check_dir "typecho-site" "Typecho directory"
check_file "typecho-site/index.php" "Typecho index"
check_dir "typecho-site/usr" "Typecho usr directory"
check_dir "typecho-site/var" "Typecho var directory"

echo ""
echo "=========================================="
echo "Deployment Check Results"
echo "=========================================="
echo ""
echo "Total Checks: $total_checks"
echo -e "Passed: ${GREEN}$passed_checks${NC}"
echo -e "Failed: ${RED}$((total_checks - passed_checks))${NC}"
echo ""

if [ $passed_checks -eq $total_checks ]; then
    echo -e "${GREEN}✓ All checks passed! Ready to deploy.${NC}"
    echo ""
    echo "Next steps:"
    echo "1. Start test environment: ./start-test-env.sh"
    echo "2. Visit: http://localhost:8080"
    echo "3. Complete Typecho installation"
    echo "4. Activate Fuwari theme"
    exit 0
else
    echo -e "${RED}✗ Some checks failed. Please review the errors above.${NC}"
    exit 1
fi
