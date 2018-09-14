'use babel';

import { CompositeDisposable } from 'atom'

export default {

  subscriptions: null,

  activate() {
    this.subscriptions = new CompositeDisposable()

    this.subscriptions.add(atom.commands.add('atom-workspace', {
      'php-tools:insert-class-member': () => this.importClassMember()
    }))
},

  deactivate() {
    this.subscriptions.dispose()
  },

  importClassMember() {
    const editor = atom.workspace.getActiveTextEditor();

    if(!editor) return;

    const activeFilePath = editor.getPath();

    const exec = require('child_process').exec;

    const cmd = `php ${__dirname}/php/src/importClassMembers.php "${activeFilePath}"`;

    exec(cmd, function(error, stdout, stderr) {
			console.log(error, stdout, stderr);
		})
  }
};
