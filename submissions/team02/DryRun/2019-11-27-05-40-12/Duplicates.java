import java.io.File;
import java.util.*;
import java.util.Scanner;

public class Duplicates {
    public static void main(String[] args)throws Exception{
        Scanner sc = new Scanner(new File("duplicates.dat"));
        char[] vowels = {'A','E','I','O','U'};

        int num = sc.nextInt();sc.nextLine();

        for(int i =0; i < num; i++){
            String line = sc.nextLine();
            boolean works = true;
            int lastIndex = 0;
            for(int j = 0; j < vowels.length; j++){
                int index = line.indexOf("" + vowels[j], lastIndex);
                if(index == -1){
                    works = false;
                    break;
                }
                lastIndex = index;
            }

            if(works){
                System.out.println("YES");
            }
            else{
                System.out.println("NO");
            }
        }
    }
}