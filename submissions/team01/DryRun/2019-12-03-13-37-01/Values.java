import java.io.File;
import java.util.ArrayList;
import java.util.Scanner;

public class Values {
    public static void main(String[] args) throws Exception {
        Scanner sc = new Scanner(new File("values.dat"));
        int tc = sc.nextInt();
        sc.nextLine();
        ArrayList<String> words = new ArrayList<>();
        ArrayList<Integer> nums = new ArrayList<>();
        for(int i = 0; i < tc; i++) {
            String s = sc.nextLine();
            int total = 0;
            for(int j = 0; j < s.length(); j++) {
                if(s.charAt(j) != ' ')
                    total += (s.charAt(j)-64);
            }
            //System.out.println(total + " " + s);

            if(words.isEmpty()) {
                nums.add(total);
                words.add(s);
            }
            else {
                for (int j = 0; j < words.size(); j++) {
                    if (total < nums.get(j)) {
                        nums.add(j, total);
                        words.add(j, s);
                        break;
                    } else if (total == nums.get(j)) {
                        if (words.get(j).compareTo(s) > 0) {
                            nums.add(j, total);
                            words.add(j, s);
                            break;
                        } else {
                            nums.add(j + 1, total);
                            words.add(j + 1, s);
                            break;
                        }
                    }
                    else if(j == words.size()-1){
                        nums.add(total);
                        words.add(s);
                        break;
                    }
                }


            }


        }

        for(int i = 0; i < words.size(); i ++) {
            System.out.println(nums.get(i) + " " + words.get(i));
        }


    }
}