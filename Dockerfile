FROM csunmetalab/environment:base
ARG DEBIAN_FRONTEND=noninteractive
# Add Yarn Debian Repo
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
 && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
 && apt-get update \
# Update and install additional dependencies/packages
  && apt-get upgrade -y && apt-get update -y && apt-get install -y \
  php7.2-ldap \
  php7.2-sqlite3 \
  sqlite3 \
  vim \
  yarn \
# Install NVM
  && curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash \
# Define Bashrc source
  && . ~/.bashrc \
# Install NPM v9.11.2
  && nvm install 9.11.2 \
# Clean image
  && npm cache clean --force && apt-get clean && apt-get autoremove && rm -rf /var/lib/apt/lists/* \
