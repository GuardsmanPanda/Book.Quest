require('esbuild').build({
    entryPoints: ['Web/Shared/js/app.js'],
    sourcemap: true,
    watch: process.argv.includes("--watch"),
    bundle: true,
    minify: true,
    logLevel: "debug",
    define: {
        global: "window"
    },
    outfile: 'public/static/dist/app.js',
}).catch(() => process.exit(1))

const fs = require('fs')
fs.writeFile('public/mix-manifest.json', JSON.stringify({
    "/static/dist/app.js": "/static/dist/app.js?id=" + Math.random().toString(36).substr(2) + Math.random().toString(36).substr(2),
    "/static/dist/app.css": "/static/dist/app.css?id=" + Math.random().toString(36).substr(2) + Math.random().toString(36).substr(2,),
}), (err) => {
    if (err) throw err;
});

console.log('Build complete')