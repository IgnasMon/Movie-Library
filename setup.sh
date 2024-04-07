#!/bin/bash

# Navigate to the project directory
cd /app

# Initialize Tailwind CSS
npx tailwindcss init -p

# Build the CSS
npx tailwindcss build -o public/css/style.css