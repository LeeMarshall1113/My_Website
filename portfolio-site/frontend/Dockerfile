FROM node:18-alpine AS build
WORKDIR /app
COPY src/ /app/src/
RUN echo '{"name":"portfolio-frontend","private":true,"dependencies":{"react":"^18.3.0","react-dom":"^18.3.0"}}' > package.json
RUN npm install
RUN npx esbuild src/App.jsx --bundle --outfile=dist/app.js --format=esm --minify
FROM nginx:alpine
COPY --from=build /app/dist /usr/share/nginx/html
