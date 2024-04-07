FROM php:fpm

# To correctly and fully automatically import the Tailwind and it's requirements,
# I looked around and in the end with the help of AI was able to fix the issues;


# Install Node.js and npm
RUN apt-get update && apt-get install -y \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# To install Tailwind CSS correctly and install navigate to /app
COPY . /app
WORKDIR /app

# Install Tailwind CSS and dependencies
RUN npm install -g tailwindcss postcss autoprefixer

# Copy the setup script
COPY setup.sh /app/setup.sh

# Make the setup script executable
RUN chmod +x /app/setup.sh

# Run the setup script during the image build
RUN /bin/bash /app/setup.sh

# Expose port 9000
EXPOSE 9000

CMD ["php-fpm"]

# For Debugging
# RUN pecl install xdebug && docker-php-ext-enable xdebug