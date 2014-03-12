
def main():
    lines = open('dodge.txt', 'r').readlines()
    for line in lines:
        line = line.replace("Dodge", "").replace(" ", "").replace("\n", "")
        print line





if __name__ == '__main__':
    main()
