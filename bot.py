from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import os
import time
import requests

dir_path = os.getcwd()
chrome_options2 = Options()
chrome_options2.add_argument(r"user-data-dir=" + dir_path + "/profile/login")
driver = webdriver.Chrome(options=chrome_options2)
driver.get('https://web.whatsapp.com/')
time.sleep(10)

def bot():
    try:
        bolinha = driver.find_element(By.CLASS_NAME, 'aumms1qt')
        bolinha = driver.find_elements(By.CLASS_NAME, 'aumms1qt')
        clica_bolinha = bolinha[-1]
        acao_bolinha = webdriver.common.action_chains.ActionChains(driver)
        acao_bolinha.move_to_element_with_offset(clica_bolinha,0,-20)
        acao_bolinha.click()
        acao_bolinha.perform()
        acao_bolinha.click()
        acao_bolinha.perform()
        time.sleep(1)

        #l7jjieqr cfzgl7ar ei5e7seu h0viaqh7 tpmajp1w c0uhu3dl riy2oczp dsh4tgtl sy6s5v3r gz7w46tb lyutrhe2 qfejxiq4 fewfhwl7 ovhn1urg ap18qm3b ikwl5qvt j90th5db aumms1qt

        telefone_cliente = driver.find_element(By.XPATH, '//*[@id="main"]/header/div[2]/div/div/div/span')
        telefone_final = telefone_cliente.text
        print(telefone_final)
        time.sleep(1)


        todas_msgs = driver.find_elements(By.CLASS_NAME,'_21Ahp')
        todas_msgs_txt = [e.text for e in todas_msgs]
        msg = todas_msgs_txt[-1]
        print(msg)
        time.sleep(3)


        campo_de_texto = driver.find_element(By.XPATH, '//*[@id="main"]/footer/div[1]/div/span[2]/div/div[2]/div[1]/div/div[1]/p')
        campo_de_texto.click()
        time.sleep(1)
        campo_de_texto.send_keys('Olá aqui é o bot!', Keys.ENTER)


        webdriver.ActionChains(driver).send_keys(Keys.ESCAPE).perform()
    except: 
        print('Aguardando as mensagens!')       

while True:
    bot()