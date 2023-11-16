import * as esbuild from 'esbuild';

esbuild.build({
    entryPoints: ['./resources/js/splide.js'],
    outfile: './resources/dist/splide.js',
    bundle: true,
    mainFields: ['module', 'main'],
    platform: 'neutral',
    treeShaking: true,
    target: ['es2020'],
    minify: true,
})
