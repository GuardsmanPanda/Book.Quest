require('esbuild').build({
    entryPoints: ['Web/Www/Shared/js/app.js'],
    sourcemap: true,
    watch: process.argv.includes("--watch"),
    bundle: true,
    minify: true,
    logLevel: "info",
    define: {
        global: "window"
    },
    outfile: 'public/static/dist/app.js',
}).catch(() => process.exit(1))

const exec = require('child_process').exec;
exec('npx tailwindcss -c Web/Www/Shared/js/tailwind.config.js -i Web/Www/Shared/css/app.css -o public/static/dist/app.css', function(error, stdout, stderr){ console.log('\n----\nCSS ' + stdout);  console.log(stderr); });

const fs = require('fs')
fs.writeFile('public/mix-manifest.json', JSON.stringify({
    "/static/dist/app.js": "/static/dist/app.js?id=" + Math.random().toString(36) + Math.random().toString(36),
    "/static/dist/app.css": "/static/dist/app.css?id=" + Math.random().toString(36) + Math.random().toString(36),
}), (err) => {
    if (err) throw err;
});

console.log('Build complete')