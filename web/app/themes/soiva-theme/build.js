const esbuild = require('esbuild');
const sass = require('sass');
const fs = require('fs');
const path = require('path');
const postcss = require('postcss');
const autoprefixer = require('autoprefixer');

const isProd = process.argv.includes('--prod');
const isWatch = process.argv.includes('--watch');

const paths = {
  styles: {
    src: 'assets/styles',
    dist: 'dist/styles',
  },
  scripts: {
    src: 'assets/scripts',
    dist: 'dist/scripts',
  },
};

function ensureDir(dir) {
  if (!fs.existsSync(dir)) fs.mkdirSync(dir, { recursive: true });
}

async function buildStyles() {
  ensureDir(paths.styles.dist);

  const files = fs.readdirSync(paths.styles.src).filter(f => f.endsWith('.scss'));

  for (const file of files) {
    const inputPath = path.join(paths.styles.src, file);
    const outFile = path.join(paths.styles.dist, file.replace(/\.scss$/, '.css'));

    const result = sass.renderSync({
      file: inputPath,
      outFile,
      sourceMap: !isProd,
      outputStyle: isProd ? 'compressed' : 'expanded',
    });

    const postcssResult = await postcss([autoprefixer]).process(result.css, {
      from: undefined,
      map: !isProd ? { inline: true } : false,
    });

    fs.writeFileSync(outFile, postcssResult.css);
  }
}

async function buildScripts() {
  ensureDir(paths.scripts.dist);

  await esbuild.build({
    entryPoints: fs.readdirSync(paths.scripts.src)
      .filter(f => f.endsWith('.js'))
      .map(f => path.join(paths.scripts.src, f)),
    outdir: paths.scripts.dist,
    bundle: true,
    sourcemap: !isProd,
    minify: isProd,
  });
}

async function buildAll() {
  await buildStyles();
  await buildScripts();
}

if (isWatch) {
  console.log('Watching for changes...');
  buildAll();
  require('chokidar').watch('assets/').on('change', buildAll);
} else {
  buildAll();
}
