import sys
import random
from PyQt5.QtWidgets import (
    QApplication, QLabel, QMainWindow, QVBoxLayout,
    QWidget, QProgressBar, QDesktopWidget, QTextEdit, QPushButton, QLineEdit
)
from PyQt5.QtCore import Qt, QTimer

def centralizar(janela):
    tela = QDesktopWidget().availableGeometry().center()
    frame = janela.frameGeometry()
    frame.moveCenter(tela)
    janela.move(frame.topLeft())

# 1. Falsa instalação
class JanelaInstalacao(QMainWindow):
    def __init__(self):
        super().__init__()
        self.setWindowTitle("root@linux:~# Instalando pacotes...")
        self.setFixedSize(600, 200)
        self.setStyleSheet("background-color: black; color: lime; font-family: Consolas; font-size: 14px;")
        centralizar(self)

        self.mensagens = [
            "Iniciando instalação...",
            "Baixando pacotes...",
            "Instalando dependências...",
            "Finalizando...",
            "Concluído."
        ]
        self.mensagem_indice = 0

        self.label = QLabel(self.mensagens[0])
        self.label.setAlignment(Qt.AlignLeft | Qt.AlignTop)

        self.progress = QProgressBar()
        self.progress.setStyleSheet("""
            QProgressBar {background-color: black; color: lime; border: 1px solid lime;}
            QProgressBar::chunk {background-color: lime;}
        """)
        self.progress.setMaximum(100)

        layout = QVBoxLayout()
        layout.addWidget(self.label)
        layout.addWidget(self.progress)
        container = QWidget()
        container.setLayout(layout)
        self.setCentralWidget(container)

        self.valor = 0
        self.timer = QTimer()
        self.timer.timeout.connect(self.atualizar)
        self.timer.start(100)

    def atualizar(self):
        self.valor += random.randint(1, 7)
        self.progress.setValue(self.valor)
        if self.valor >= 20 * (self.mensagem_indice + 1) and self.mensagem_indice < len(self.mensagens)-1:
            self.mensagem_indice += 1
            self.label.setText(self.mensagens[self.mensagem_indice])
        if self.valor >= 100:
            self.timer.stop()
            self.label.setText("Instalação finalizada com sucesso.")

# 2. Falso relatório do sistema
class JanelaRelatorio(QMainWindow):
    def __init__(self):
        super().__init__()
        self.setWindowTitle("root@system:~# Relatório de Sistema")
        self.setFixedSize(500, 250)
        self.setStyleSheet("background-color: black; color: lime; font-family: Consolas; font-size: 14px;")
        centralizar(self)

        info = "\n".join([
            f"CPU: {random.randint(15, 90)}% em uso",
            f"RAM: {random.randint(2048, 8192)}MB usada",
            f"Disco: {random.randint(20, 95)}% cheio",
            "Processos ativos: " + str(random.randint(80, 150)),
            "Status: Operacional"
        ])
        self.label = QLabel(info)
        self.label.setAlignment(Qt.AlignTop)
        layout = QVBoxLayout()
        layout.addWidget(self.label)
        container = QWidget()
        container.setLayout(layout)
        self.setCentralWidget(container)

# 3. Bloco de notas
class JanelaNota(QMainWindow):
    def __init__(self):
        super().__init__()
        self.setWindowTitle("root@linux:~# Notas")
        self.setFixedSize(500, 300)
        self.setStyleSheet("background-color: black; color: lime; font-family: Consolas; font-size: 14px;")
        centralizar(self)

        self.texto = QTextEdit()
        self.texto.setStyleSheet("background-color: black; color: lime;")
        layout = QVBoxLayout()
        layout.addWidget(self.texto)
        container = QWidget()
        container.setLayout(layout)
        self.setCentralWidget(container)

# 4. Calculadora
class JanelaCalculadora(QMainWindow):
    def __init__(self):
        super().__init__()
        self.setWindowTitle("root@calc:~# Calculadora")
        self.setFixedSize(400, 200)
        self.setStyleSheet("background-color: black; color: lime; font-family: Consolas; font-size: 14px;")
        centralizar(self)

        self.entrada = QLineEdit()
        self.entrada.setStyleSheet("background-color: black; color: lime;")
        self.resultado = QLabel("Resultado: ")
        self.resultado.setStyleSheet("color: lime;")
        self.botao = QPushButton("Calcular")
        self.botao.setStyleSheet("background-color: black; color: lime; border: 1px solid lime;")
        self.botao.clicked.connect(self.calcular)

        layout = QVBoxLayout()
        layout.addWidget(self.entrada)
        layout.addWidget(self.botao)
        layout.addWidget(self.resultado)
        container = QWidget()
        container.setLayout(layout)
        self.setCentralWidget(container)

    def calcular(self):
        try:
            resultado = eval(self.entrada.text())
            self.resultado.setText(f"Resultado: {resultado}")
        except:
            self.resultado.setText("Erro na expressão.")

# 5. Terminal animado (falso)
class JanelaTerminal(QMainWindow):
    def __init__(self):
        super().__init__()
        self.setWindowTitle("root@fake-terminal:~#")
        self.setFixedSize(600, 250)
        self.setStyleSheet("background-color: black; color: lime; font-family: Consolas; font-size: 14px;")
        centralizar(self)

        self.label = QLabel("root@terminal:~# ")
        self.label.setAlignment(Qt.AlignTop)
        self.texto = ""

        layout = QVBoxLayout()
        layout.addWidget(self.label)
        container = QWidget()
        container.setLayout(layout)
        self.setCentralWidget(container)

        self.timer = QTimer()
        self.timer.timeout.connect(self.animar)
        self.timer.start(100)

    def animar(self):
        comandos = ["sudo apt update", "ls -la", "ping google.com", "whoami", "clear"]
        if len(self.texto.splitlines()) > 10:
            self.texto = ""
        self.texto += f"root@fake:~# {random.choice(comandos)}\n"
        self.label.setText(self.texto)

# Execução
if __name__ == "__main__":
    app = QApplication(sys.argv)

    j1 = JanelaInstalacao()
    j2 = JanelaRelatorio()
    j3 = JanelaNota()
    j4 = JanelaCalculadora()
    j5 = JanelaTerminal()

    j1.show()
    j2.show()
    j3.show()
    j4.show()
    j5.show()

    sys.exit(app.exec_())
